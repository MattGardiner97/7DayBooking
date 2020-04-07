<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedules";
    public $timestamps = false;
    
    protected $fillable =[
        "CounsellorID", "StartDate","EndDate","ScheduleString"
    ];
    protected $test;

    protected $attributes =[
                "StartDate" => "2020-01-01",
        "EndDate" => "2021-01-01",
        "ScheduleString" => ""
    ];

    public function GetTimeslots(){
        $result = array();
        $dayArray = explode("/",$this->ScheduleString);
        foreach($dayArray as $day){
            $hourArray = explode(",",$day);
            if($hourArray[0] == ""){
                array_push($result,array());
            }
            else{
            array_push($result,$hourArray);
            }
        }
        return $result;
    }
}
