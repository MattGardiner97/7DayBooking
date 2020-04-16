function FormatTime(number){
    if(number < 12)
    return number + ":00AM";
    else if(number == 12)
    return "12:00PM";
    else
    return (number-12) + ":00PM";
}

function appointmentDate_changed(sender){
    var url = "/appointments/getavailabletimeslots?CounsellorID=" + $("#txtCounsellor").val() + "&Date=" + $(sender).val();
    $.getJSON(url,function(result){

        $("#selectTime").removeAttr("disabled");
        //$("#selectTime").empty();
        $("#timeError").addClass("d-none");

       Object.keys(result).forEach(function(item){
           var newTag = "<option value='" + result[item] + "'>" + FormatTime(result[item]) + "</option>"
           $("#selectTime").append(newTag);
       });
    }).fail(function(){
        $("#selectTime").empty();
        $("#selectTime").attr("disabled","disabled");
        $("#timeError").removeClass("d-none");
    });
}