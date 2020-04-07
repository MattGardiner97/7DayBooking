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
        $this->middleware("roles:Counsellor")->except('show');
    }

    public function show(User $user)
    {
        // check the user the person wants to view is a counsellor
        if($user->role == 'Counsellor') {
            return view('psychologists.view',['counseller'=>$counseller ]);
        } else {
            return redirect('/');
        }
    }

    public function new()
    {
        return view('');
    }
}
