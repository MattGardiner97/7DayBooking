@extends('layouts.app') 


@section('scripts')
<link rel="stylesheet" href="/css/UpdateSchedule.css">
<script src="/js/UpdateSchedule.js"></script> 
@endsection

@section('content')
<div class="container">
<a href="/schedules/show">< Back to Schedules</a>

    <h1>Update Schedule</h1>

<p>Please specify a Monday for the schedule to start on, a Friday for the schedule to end on, and the hours you are available for each day.</p>

        <div class="d-flex">
            <div class="form-group">
                    <label>Start Date</label>
                        <input type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" id="DateStart">
            </div>
            <div class="form-group ml-2">
                    <label>End Date</label>
                    <input type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" id="DateEnd">
                
            </div>
        </div>

    <table class="table text-center">
        <thead>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
        </thead>
        <tbody>
            @for($hourIndex = 8; $hourIndex <=16;$hourIndex++) 
            <tr>
                @for($dayIndex = 0;$dayIndex <5;$dayIndex++) 
                <td data-dayIndex="{{$dayIndex}}" data-hour="{{$hourIndex}}" class="timeslot" style="border:none!important" onmouseup="timeslotCell_MouseUp(this)">
                    <input type="checkbox" class="timeCheckbox">
                    {{$hourIndex . ":00 - " . ($hourIndex +1) . ":00"}}
                </td>
                @endfor
            </tr>
            @endfor
        </tbody>
    </table>

    <form method="post" action="/schedules/update">
        <input type="hidden" name="id" id="txtID" value="{{$schedule->id}}">
        <input type="hidden" name="StartDate" id="dateStartHidden">
        <input type="hidden" name="EndDate" id="dateEndHidden">
        <input type="hidden" name="ScheduleString" id="txtSchedule" value="{{$schedule->ScheduleString}}">
        <input type="submit" onclick="Submit_Clicked();" class="btn btn-primary float-right">

    </form>
</div>
@endsection