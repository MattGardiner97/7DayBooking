<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("roles:Counsellor");
    }

    //Displays all schedules for a counsellor
    public function Show(Request $request)
    {
        $counsellorID = $request->user()->id;
        $counsellorName = $request->user()->name;
        $schedules = Schedule::where("CounsellorID", $counsellorID)->get();
        return view("Schedules/Show", ["schedules" => $schedules, "name" => $counsellorName]);
    }

    public function Create(Request $request)
    {
        $counsellorID = $request->user()->id;
        $result = Schedule::create(["CounsellorID" => $counsellorID]);
        return redirect("/schedules/update?id=" . $result->id);
    }

    public function Update_Get(Request $request)
    {
        $id = $request->input("id");
        $result = Schedule::where("id", $id)->first();
        return view("schedules/update", ["schedule" => $result]);
    }

    public function Update_Post(Request $request)
    {
        $schedule = Schedule::where("id", $request->input("id"))->first();
        $schedule->StartDate = $request->input("StartDate");
        $schedule->EndDate = $request->input("EndDate");
        $schedule->ScheduleString = $request->input("ScheduleString");
        $schedule->save();
        return redirect("/schedules/show");
    }

    public function Delete(Request $request)
    {
        $scheduleID = $request->input("id");
        $result = Schedule::where("id", $scheduleID)->first();
        $counsellorID = $result->CounsellorID;
        $result->delete();
        return redirect("/schedules/show");
    }

    

    
}
