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

    //allows a psychologist to create/edit their new biography section
    public function create()
    {
        $psychologists = User::where('role', 'Counsellor')->get();
        return view('counsellors.new' )->with('counseller', $psychologists);

    }


    public function show(Request $request)
    {
        $counsellerId = $request->query("id");
      
        $counseller = User::where('id',$counsellerId)->first();
        //echo $counseller;//->name;
        //echo $bio;
        return view ('counsellors.view', ['counseller'=>$counseller ]);
    }

    public function show_2(User $user)
    {
        return view('counsellors.view')->with('counsellor', $user);
    }
}
