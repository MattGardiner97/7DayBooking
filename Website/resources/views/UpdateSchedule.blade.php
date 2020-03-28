<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/UpdateSchedule.css">
        <script src="/js/UpdateSchedule.js"></script>
</head>

<body>
    <div class="container">
        <h1>Update Schedule</h1>

    <div class="input-group">
        <label>Start Date</label>
        <input type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" id="DateStart">
    </div>
    <div class="input-group">
        <label>End Date
        <input type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" id="DateEnd">
    </div>

        <table class="table text-center">
            <thead>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </thead>
            <tobdy>
                @for($hourIndex = 8; $hourIndex <= 16;$hourIndex++)
                <tr>
                @for($dayIndex = 0;$dayIndex <5;$dayIndex++)
                    <td data-dayIndex="{{$dayIndex}}" data-hour="{{$hourIndex}}" class="timeslot timeslotUnavailable" onmouseup="timeslotCell_MouseUp(this)">
                        {{$hourIndex . ":00 - " . ($hourIndex +1) . ":00"}}
                    </td>
                    @endfor
                </tr>
                @endfor

            </tobdy>
        </table>

    <form method="post" action="/Schedule/Update">
        <input type="hidden" name="id" id="txtID" value="{{$schedule->id}}">
        <input type="hidden" name="StartDate" id="dateStartHidden">
        <input type="hidden" name="EndDate" id="dateEndHidden">
        <input type="hidden" name="ScheduleString" id="txtSchedule" value="{{$schedule->ScheduleString}}">
        <input type="submit" onclick="Submit_Clicked();" class="btn btn-primary float-right">

    </form>
    </div>
    
</body>

</html>
