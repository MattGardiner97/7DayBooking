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
        $this->middleware("roles:Counsellor"); //Restrict actions to counsellors
    }

    //Displays all schedules for a counsellor
    public function Show(Request $request)
    {
        $counsellorID = $request->user()->id;
        $counsellorName = $request->user()->name;
        $schedules = Schedule::where("CounsellorID", $counsellorID)->get();
        return view("schedules.show", ["schedules" => $schedules, "name" => $counsellorName]);
    }

    //Displays new schedule page
    public function New(Request $request) {
        return view("schedules.new");
    }

    //Creates a new schedule
    public function Create(Request $request)
    {
//TODO: Add validation

        $counsellorID = $request->user()->id;
        $startDate = $request->input("startDate");
        $endDate = $request->input("endDate");
        $result = Schedule::create(["CounsellorID" => $counsellorID, "StartDate" => $startDate, "EndDate" => $endDate]);
        return redirect("/schedules/update?id=" . $result->id);
    }

    //Retrieves the page schedule update page
    public function Update_Get(Request $request)
    {
        $id = $request->input("id");
        $result = Schedule::where("id", $id)->first();
        return view("schedules/update", ["schedule" => $result]);
    }

    //The post action for updating a schedule
    public function Update_Post(Request $request)
    {
        $schedule = Schedule::where("id", $request->input("id"))->first();
        $schedule->StartDate = $request->input("StartDate");
        $schedule->EndDate = $request->input("EndDate");
        $schedule->ScheduleString = $request->input("ScheduleString");
        $schedule->save();
        return redirect("/schedules/show");
    }

    //Delete a schedule
    public function Delete(Request $request)
    {
        $scheduleID = $request->input("id");
        $result = Schedule::where("id", $scheduleID)->first();
        $counsellorID = $result->CounsellorID;
        $result->delete();
        return redirect("/schedules/show");
    }

}
