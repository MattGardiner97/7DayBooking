<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function CreateAppointment(){
        return view("NewAppointment");
    }

    public function StoreAppointment(Request $request){
        $p_id = $request -> input('p_id');
        $c_id = $request->user()->id;
        $date = $request -> input('date');
        $time = $request -> input('time');
        $notes = $request -> input('notes');
        
        $appointment = new Appointment;
        $appointment -> psychologist_id = $p_id;
        $appointment -> client_id = $c_id;
        $appointment -> date = $date;
        $appointment -> time = $time;
        $appointment -> notes = $notes;
        $appointment -> save();

        return redirect('home');
    }
}
