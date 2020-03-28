<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        // perform check the user is a psycholgist, if not, do not show the user page? 
        return view('psychologists.view')->with('psychologist', $user);
        //return $user->name;
    }
}
