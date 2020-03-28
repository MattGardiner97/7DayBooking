<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class ScheduleController extends Controller{
    public function UpdateSchedule_Post(Request $request){
        $schedule = Schedule::where("id",$request->input("id"))->first();
        error_log($request);
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
        $counsellorID = $request->input("CounsellorID");
        $result = Schedule::create(["CounsellorID" => $counsellorID]);
        return redirect("/Schedule/Update?id=" . $result->id);
    }

    public function GetSchedules(Request $request){
        $counsellorID = $request->input("CounsellorID");
        $schedules = Schedule::where("CounsellorID",$counsellorID)->get();
        return view("ShowSchedules",["schedules" => $schedules,"counsellorid"=>$counsellorID]);

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