<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

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
        //$this->middleware("roles:Counsellor")->except('show');
    }

    public function show(User $user)
    {
        // check the user the person wants to view is a counsellor
        if($user->role == 'Counsellor') {
            return view('counsellors.view')->with('counsellor', $user);
        } else {
            return redirect('/');
        }
    }

    public function new()
    {
        return view('');
    }

    public function profile(User $user)
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('users.profile')->with('user', $user);
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->input('id'))->first();

        if($request->input("password") != null){
            $user->password = Hash::make($request->input("password"));
        }

        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->biography = $request->input("biography");
        $user->save();

        return view('users.profile')->with('user', $user);
    }
}
