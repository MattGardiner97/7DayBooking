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
        $unverifiedUsers =  User::where([["role", "=", "Counsellor"],["verified", "=","false"]])->get();
        return view("admin/index", ["users"=>$unverifiedUsers]);
    }

    public function Verify_Get(){
        $unverifiedUsers =  User::where([["role", "=", "Counsellor"],["verified", "=","false"]])->get();
        return view("admin/verify", ["users"=>$unverifiedUsers]);
    }

    public function Verify_Post(Request $request){
        $userID = $request->input("id");
    }
}
