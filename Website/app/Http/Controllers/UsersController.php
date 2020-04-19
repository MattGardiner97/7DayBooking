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
            return view('users.view')->with('counsellor', $user);
        } else {
            return redirect('/');
        }
    }

    //build all counsellors list.
    public function showAllCounsellors()
    {
        $counsellors = User::where('role', 'Counsellor')->get();

        return view('users.list')->with('counsellors', $counsellors);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('counsellor', $user);
    }

    //for updating a users details
    public function update( Request $request)
    {

        
        if (User::where('id', auth()->user()->id)->exists()){
            $loggedUser = User::where('id', auth()->user()->id)->first();
            //do error checking if User logged in Id matches User id of person browing
            //if same, then allow the person to update the details. This is added protection in case
            //of injection attacks.
            
            if ($loggedUser->id == $request->input('id')) {
                $loggedUser->biography = $request->input('biography');
                $loggedUser->save();
                //log message?
            }
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
