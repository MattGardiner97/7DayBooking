<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        //$this->middleware("roles:Client");
    }

    public function CreateAppointment(){
        return view("NewAppointment");
    }

    public function StoreAppointment(Request $request){
        $p_id = $request -> input('p_id');
        $c_id = $request->user()->id;
        if($request -> filled('date')){
            $date = $request -> input('date');
        }else{
            die("Please enter a date!");
        }
        $time = $request -> input('time');
        $notes = $request -> input('notes');
        if($notes == NULL){
            $notes = "";
        }
        
        $appointment = new Appointment;
        $appointment -> psychologist_id = $p_id;
        $appointment -> client_id = $c_id;
        $appointment -> date = $date;
        $appointment -> time = $time;
        $appointment -> notes = $notes;
        $appointment -> save();

        return redirect('home');
    }

    public function store(Appointment $appointment)
    {
        $appointment = Appointment::create($this->validateRequest());

        return redirect('/');
    }

    public function show_all() 
    {
        // get the appointments for the user
        $appointments = Appointment::where('client_id', auth()->user()->id)->get();
        
        // return view
        return view('appointments.all', compact('appointments'));
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect('/appointment/show');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'psychologist_id' => 'required',
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
    }
}
