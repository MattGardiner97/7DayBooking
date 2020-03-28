function timeslotCell_MouseUp(sender) {
    SwapState(sender);
}

function BuildScheduleString(Schedule) {
    dayStrings = [];
    for (var day = 0; day < 5; day++) {
        dayStrings.push(Schedule[day].join(","));
    }
    return dayStrings.join("/");
}

function SwapState(Cell) {
    if ($(Cell).hasClass("timeslotUnavailable")) {
        $(Cell).removeClass("timeslotUnavailable");
        $(Cell).addClass("timeslotAvailable");
    }
    else {
        $(Cell).addClass("timeslotUnavailable");
        $(Cell).removeClass("timeslotAvailable");
    }
}

function Submit_Clicked() {
    var payload = {};
    var schedule = [[], [], [], [], []];

    $(".timeslotAvailable").each(function (index, cell) {
        var dayIndex = $(cell).attr("data-dayIndex");
        var hour = $(cell).attr("data-hour");
        schedule[dayIndex].push(hour);
    });
    var scheduleString = BuildScheduleString(schedule);
    $("#txtSchedule").val(scheduleString);
    $("#dateStartHidden").val($("#DateStart").val());
    $("#dateEndHidden").val($("#DateEnd").val());
}

function DisplayExistingValues(ScheduleString) {
    var daySplit = ScheduleString.split("/");
    for (i = 0; i < 5; i++) {
        var hourArray = daySplit[i].split(",");
        hourArray.forEach(function (hour) {
            if (hour == "")
                return;
            var selector = ".timeslot[data-dayindex=" + i + "][data-hour=" + hour + "]";
            var cell = $(selector);
            SwapState(cell);
        });

    }
}

$(document).ready(function () {
    var scheduleString = $("#txtSchedule").val();
    DisplayExistingValues(scheduleString);
});

