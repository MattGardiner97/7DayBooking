<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

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
        $psychologists = User::where('role', 'Counsellor')->get();

        // return $psychologists;
        return view("appointments.new")->with('psychologists', $psychologists);
    }

    // Show the all appointments page
    public function show_all()
    {
        // get the appointments for the user
        $appointments = Appointment::where('client_id', auth()->user()->id)->get();
        
        // return view
        return view('appointments.all', compact('appointments'));
    }

    // Store the appointment to database
    public function store(Appointment $appointment)
    {
        $appointment = Appointment::create($this->validateRequest());
 
        return redirect('/');
    }

    // Delete the appointment from database
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect('/appointment/show');
    }

    // Validate data
    protected function validateRequest()
    {
        return request()->validate([
            'psychologist_id' => 'required',
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'notes' => '',
        ]);
    }
}
