function approve_clicked(sender){
    $.post("/admin/verify",{"id": $(sender).attr("data-id")});
}