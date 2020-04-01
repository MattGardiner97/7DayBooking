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
    <div class="container">
        <form method="post">
           
        @if (Auth::guest())
        
            <div class="col-sm-6 center-block text-center mt-5">
            <a href="/login">You need to register or login</a>
            </div>
        
        @else 
            
            <div class="col-sm-6 center-block text-center mt-5">
                <div class="col-md" style="margin: auto">
                    <div class="form-group">
                        <label><span class="fa fa-info-circle" data-placement="top"></span>Select Counsellor</label>
                        <select class="form-control" name="p_id">
                            <option value="1">Dr. Timothy Test</option>
                            <option value="2">Dr. Madeline Testerooni</option>
                            <option value="3">Dr. Samantha nolastname</option>
                            <option value="4">Dr. John Smith</option>
                            <option value="5">Dr. Jane Doe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><span class="fa fa-info-circle" data-placement="top"></span>Enter Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><span class="fa fa-info-circle" data-placement="top"></span>Select Time</label>
                        <select class="form-control" name="time">
                            <option value="9">9am</option>
                            <option value="10">10am</option>
                            <option value="11">11am</option>
                            <option value="12">12am</option>
                            <option value="13">1pm</option>
                            <option value="14">2pm</option>
                            <option value="15">3pm</option>
                            <option value="16">4pm</option>
                            <option value="17">5pm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><span class="fa fa-info-circle" data-placement="top"></span>Enter Notes</label>
                        <textarea name="notes" class="form-control"> </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"
                            value="submit">Submit</button>
                    </div>
                </div>
            </div>
        @endif
        </form>
        
    </div>
<html>