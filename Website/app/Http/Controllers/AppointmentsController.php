<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function all()
    {
        if(Auth::user()->role == 'Client') 
        {
            // get the appointments for the client
            $appointments = Appointment::where('client_id', auth()->user()->id)->get();
        } 
        elseif(Auth::user()->role == 'Counsellor') 
        {
            // get the appointments for the counsellor
            $appointments = Appointment::where('counsellor_id', auth()->user()->id)->get();
        } 
        else 
        {
            $appointemnts = null;
        }
        
        // return view
        return view('appointments.all', compact('appointments'));
    }

    // Store the appointment to database
    public function store(Request $request)
    {
        $existingAppointments = Appointment::where([
            ["counsellor_id","=", $request->input("counsellor_id")],
            ["date","=",$request->input("date")],
            ["time","=",$request->input("time")]
        ])->get();
        if($existingAppointments->count() != 0){
            return $this->create()->withErrors(["existing_appointment" => "An appointment already exists for this timeslot."]);
        }

        $appointment = Appointment::create($this->validateRequest());

        return redirect('/');
    }

    // Delete the appointment from database
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        
        return redirect('/appointments/show');
    }

    //Show existing appointment details
    public function edit(Request $request)
    {
        //find details in DB
        $counsellors = User::where('role', 'Counsellor')->get();
        $appointment = Appointment::find($request -> input('appointment_id'));

        //Return view and pass information
        return view('appointments.edit') -> with(compact('appointment', 'counsellors'));
    }

    //Update existing appointment
    public function update(Request $request)
    {
        $appointment = Appointment::find($request -> input('appointment_id'));
        $appointment->counsellor_id = $request -> input('counsellor_id');
        $appointment->date = $request -> input('date');
        $appointment->time = $request -> input('time');
        $appointment->notes = $request -> input('notes');
        $appointment->save();
        return redirect('/appointments/show');
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
