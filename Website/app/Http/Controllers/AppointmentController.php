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

    public function StoreAppointment(){

    }
}
