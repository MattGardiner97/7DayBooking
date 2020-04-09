<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\User;
use DateTime;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

class AppointmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        //$this->middleware("roles:Client");
    }

    // Show the new appointment form
    public function create()
    {
        $counsellors = User::where('role', 'Counsellor')->get();

        // return $counsellors;
        return view("appointments.new")->with('counsellors', $counsellors);
    }

    // Show the all appointments page
    public function show_all()
    {
        // get the appointments for the user
        $appointments = Appointment::where('client_id', auth()->user()->id)->get();

        // return view
        return view('appointments.all', compact('appointments'));
    }

    // Show all the appointments for the counseller
    public function show_allCounsellor()
    {
        $appointments = Appointment::where('counsellor_id', auth()->user()->id)->get();

        //return view
        return view('appointments.allc', compact('appointments'));

    }

    // Store the appointment to database
    public function store(Appointment $appointment)
    {
        $appointment = Appointment::create($this->validateRequest());

        return redirect('/');
    }

    // Delete the appointment from database
    public function destroy(Request $request)
    {
        $appointment = Appointment::where('id', $request->input('appointment_id'))->delete();

        return redirect('/appointments/show');
    }

    //Show existing appointment details
    public function edit(Request $request)
    {
        //find details in DB
        $counsellors = User::where('role', 'Counsellor')->get();
        $appointment = Appointment::find($request -> input('appointment_idU'));
        return view('appointments.edit') -> with('appointments', $appointment);


        //Return view and pass information
    }

    //Update existing appointment
    public function update(Request $request)
    {/*
        $appointment = Appointment::where('id', $request->input('appointment_idU'))->get();
        $id = $request -> input('appointment_idU');
        echo $id . "<br />";
        echo $appointment;
        //echo $appointment;
        echo Appointment::model($appointment, array('route' => array('user.update', $appointment->$id)));
        */
    }

    //Gets available timeslots for a given counsellor and date
    public function GetAvailableTimeslots(Request $request)
    {
        $request->validate([
            "CounsellorID" => "required|integer",
            "Date" => "required|date",
        ]);

        $CounsellorID = $request->input("CounsellorID");
        $Date = new DateTime($request->input("Date"));
        $dayIndex = $Date->format("N") - 1;

        //Get the counsellors schedule for this date
        $schedule = Schedule::where([
            ["CounsellorID", "=", $CounsellorID],
            ["StartDate", "<=", $Date],
            ["EndDate", ">=", $Date],
        ])->first();

        if ($schedule == null) {
            return;
        }

        // Get the available timeslots for this day of the week
        $hourArray = $schedule->GetTimeslots()[$dayIndex];
        if(count($hourArray) == 0)
        {
            return;
        }

        $existingAppointmentTimes = Appointment::where([
            ["counsellor_id", "=", $CounsellorID],
            ["date", "=", $Date],
        ])->pluck("time")->toArray();

        $availableTimes = array_diff($hourArray, $existingAppointmentTimes);

        return response()->json($availableTimes);
    }

    // Validate data
    protected function validateRequest()
    {
        return request()->validate([
            'counsellor_id' => 'required',
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'notes' => '',
        ]);
    }
}
