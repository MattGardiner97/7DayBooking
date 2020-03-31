<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;


class ScheduleController extends Controller{
public function __construct(){
    $this->middleware("auth");
    $this->middleware("roles:Counsellor");
}

    public function UpdateSchedule_Post(Request $request){
        $schedule = Schedule::where("id",$request->input("id"))->first();
        $schedule->StartDate = $request->input("StartDate");
        $schedule->EndDate = $request->input("EndDate");
        $schedule->ScheduleString = $request->input("ScheduleString");
        $schedule->save();
        return redirect("/Schedule/Show?CounsellorID=" . $schedule->CounsellorID);
    }

    public function UpdateSchedule_Get(Request $request){
        $id = $request->input("id");
        $result = Schedule::where("id",$id)->first();
        return view("UpdateSchedule",["schedule" => $result]);
    }

    public function CreateSchedule(Request $request){
        $counsellorID = $request->user()->id;
        $result = Schedule::create(["CounsellorID" => $counsellorID]);
        return redirect("/Schedule/Update?id=" . $result->id);
    }

    //Gets all schedule for a counsellor
    public function GetSchedules(Request $request){
        $counsellorID = $request->user()->id;
        $counsellorName = $request->user()->name;
        $schedules = Schedule::where("CounsellorID",$counsellorID)->get();
        return view("ShowSchedules",["schedules" => $schedules,"name"=>$counsellorName]);

    }

    public function DeleteSchedule(Request $request){
        $scheduleID = $request->input("id");
        $result = Schedule::where("id",$scheduleID)->first();
        $counsellorID = $result->CounsellorID;    
        $result->delete();
        return redirect("/Schedule/Show?CounsellorID=" . $counsellorID);
    }
}

?>