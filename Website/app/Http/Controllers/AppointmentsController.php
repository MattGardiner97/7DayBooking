<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    // Show the new appointment form
    public function create()
    {
        $counsellors = User::where('role', 'Counsellor')->get();

        // return $counsellors;
        return view("appointments.edit", ['counsellors' => $counsellors, "appointment" => null]);
    }

    // Show the all appointments page
    public function all()
    {
        if (Auth::user()->role == 'Client') {
            // get the appointments for the client
            $appointments = Appointment::where('client_id', auth()->user()->id)->get();
        } elseif (Auth::user()->role == 'Counsellor') {
            // get the appointments for the counsellor
            $appointments = Appointment::where('counsellor_id', auth()->user()->id)->get();
        } else {
            $appointments = null;
        }

        // return view
        return view('appointments.all', compact('appointments'));
    }

    // save an appointment to the database
    public function store(Request $request)
    {
        // check the appointment does not exist already
        if (count(Appointment::where([
            ["counsellor_id", "=", $request->input("counsellor_id")],
            ["date", "=", $request->input("date")],
            ["time", "=", $request->input("time")],
        ])->get()) != 0) {
            // return errors
            return $this->create()->withErrors(["existing_appointment" => "An appointment already exists for this timeslot."]);
        } else {
            if ($request->input("id") == -1) {
                // create appointment
                $appointment = Appointment::create($this->validateRequest());

                // send an email
                $this->sendEmail(
                    $appointment->client->email,
                    $appointment->client->name,
                    'emails.confirmed',
                    [
                        'name' => $appointment->client->name,
                        'date' => $appointment->date,
                        'time' => $appointment->time,
                        'counsellor' => $appointment->counsellor->name,
                    ],
                    'Appointment Confirmed'
                );

                return view('appointments.confirmed', compact('appointment'));

            } else {
// update the appointment
                $appointment = Appointment::find($this->validateRequest()["id"]);
                $appointment->update($this->validateRequest());

// send an email
                $this->sendEmail(
                    $appointment->client->email,
                    $appointment->client->name,
                    'emails.changed',
                    [
                        'name' => $appointment->client->name,
                        'date' => $appointment->date,
                        'time' => $appointment->time,
                        'counsellor' => $appointment->counsellor->name,
                    ],
                    'Appointment Changed'
                );

                return view('appointments.changed', compact('appointment'));
            }
        }
    }

    // delete the appointment from database
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        // send an email
        $this->sendEmail(
            $appointment->client->email,
            $appointment->client->name,
            'emails.cancelled',
            [
                'name' => $appointment->client->name,
                'date' => $appointment->date,
                'time' => $appointment->time,
                'counsellor' => $appointment->counsellor->name,
            ],
            'Appointment Cancelled'
        );

        return view('appointments.cancelled', compact('appointment'));
    }

    // show existing appointment details
    public function edit(Appointment $appointment)
    {
        // find details in DB
        $counsellors = User::where('role', 'Counsellor')->get();

        // return view and pass information - appointment passed in by the route
        return view('appointments.edit')->with(compact('appointment', 'counsellors'));
    }

    // gets available timeslots for a given counsellor and date
    public function GetAvailableTimeslots(Request $request)
    {
        $request->validate([
            "CounsellorID" => "required|integer",
            "Date" => "required|date",
        ]);

        $CounsellorID = $request->input("CounsellorID");
        $Date = new DateTime($request->input("Date"));
        $dayIndex = $Date->format("N") - 1;

        // get the counsellors schedule for this date
        $schedule = Schedule::where([
            ["CounsellorID", "=", $CounsellorID],
            ["StartDate", "<=", $Date],
            ["EndDate", ">=", $Date],
        ])->first();

        if ($schedule == null) {
            return;
        }

        // get the available timeslots for this day of the week
        $hourArray = $schedule->GetTimeslots()[$dayIndex];
        if (count($hourArray) == 0) {
            return;
        }

        $existingAppointmentTimes = Appointment::where([
            ["counsellor_id", "=", $CounsellorID],
            ["date", "=", $Date],
        ])->pluck("time")->toArray();

        $availableTimes = array_diff($hourArray, $existingAppointmentTimes);

        return response()->json($availableTimes);
    }

    // validate data - used in store and update
    protected function validateRequest()
    {
        return request()->validate([
            'id' => '',
            'counsellor_id' => 'required',
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'notes' => '',
        ]);
    }

    protected function sendEmail($to_email, $to_name, $view, $data, $subject)
    {
        Mail::send($view, $data, function ($message) use ($to_email, $to_name, $subject) {
            $message->to($to_email, $to_name);
            $message->subject($subject);
            $message->from('noreply.7day.bookings@gmail.com', '7Day Psychology Bookings');
        });
    }
}
