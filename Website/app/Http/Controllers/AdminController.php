<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    function __construct(){
        $this->middleware("auth");
        $this->middleware("roles:Admin");
    }

    public function Index(){
        $unverifiedUsers =  User::where("requested_verification",1)->get();
        return view("admin/index", ["users"=>$unverifiedUsers]);
    }

    public function Verify_Get(){
        $unverifiedUsers =  User::where("requested_verification",1)->get();
        return view("admin/verify", ["users"=>$unverifiedUsers]);
    }

    public function Verify_Post(Request $request){
        $userID = $request->input("id");
        $user = User::where("id",$userID)->first();
        $user->role = "Counsellor";
        $user->requested_verification = 0;
        $user->save();
    }

    public function Deny_Post(Request $request){
        $userID = $request->input("id");
        $user = User::where("id",$userID)->first();
        $user->role = "Client";
        $user->save();
    }
}
