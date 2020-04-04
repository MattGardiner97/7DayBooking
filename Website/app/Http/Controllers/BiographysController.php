<?php

namespace App\Http\Controllers;

use App\Biography;
use App\User;
use Illuminate\Http\Request;

class BiographysController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("roles:Counsellor")->except('show');
    }

    //allows a psychologist to create their new biography section
    public function create()
    {
        $psychologists = User::where('role', 'Counsellor')->get();
        return view('psychologists.new' )->with('psychologists', $psychologists);

    }


    public function show(Request $request)
    {
        $counsellerId = $request->query("id");
        //echo $counsellerId;
        $bio = Biography::where('psychologist_id', $counsellerId)->first();
        $counseller = User::where('id',$counsellerId)->first();
        //echo $counseller;//->name;
        //echo $bio;
        return view ('psychologists.view',[ 'counseller' => $counseller, 'bio' => $bio] );
    }

    public function show_2(User $user)
    {
        return view('psychologists.view')->with('counsellor', $user)->with('bio', $user->bio);
    }
}
