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
        return view('users.view')->with('counsellor', $user);   
    }

    public function searchBy()
    {
        return view('users.search');
    }
    //build a list of counsellors with matches in biography field for specialization?
    //not guaranteed to work outside a keywords field because could match rubbish/useless results like 'AND' or
    //other common use words
    public function searchByResults(Request $request)
    {
        //concatenate wildcards to string as it doesn't appear that laravel does this automatically
        $searchTerm = '%' . trim($request->input('search')) . '%'; //can't be safe? sql injection?
        $counsellors = User::where('role', 'Counsellor')
                            ->where('verified', '=', '1')
                            ->where( 'biography', 'LIKE', $searchTerm)
                            ->select('id', 'name', 'email')
                            ->get();
        return view('users.list')->with('counsellors', $counsellors);
    }

    //build all counsellors list.
    public function showAllCounsellors()
    {
        $counsellors = User::where('role', 'Counsellor')
                            ->where('verified', '=', '1')
                            ->select("id", "name", "email")->get();
        return view('users.list')->with('counsellors', $counsellors);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('counsellor', $user);
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
        $record = false;
        $user = User::where('id', $request->input('id'))->first();
        if (!empty($user)){
            if($request->input("password") != null){
                $user->password = Hash::make($request->input("password"));
            }

            $user->name = $request->input("name");
            $user->email = $request->input("email");
            if (auth()->user()->id == $request->input('id'))
                $user->biography = $request->input("biography");
            
            if ($user->save())
                $record = true;
        }
        return view('users.profile')->with('user', $user)->with('record', $record);
    }
}
