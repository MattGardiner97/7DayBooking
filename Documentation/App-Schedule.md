App\Schedule
===============

Model class representing the weekly appointment availability of a counsellor.

Counsellors can specify different schedules for different times of the year using the start date and end date variables. Appointments are assumed to be 1-hour long and thus
counsellors can specify their daily availability in 1-hour blocks.


* Class name: Schedule
* Namespace: App
* Parent class: Illuminate\Database\Eloquent\Model





Properties
----------


### $table

    protected string $table = "schedules"

Denotes the name of the database table to use.



* Visibility: **protected**


### $timestamps

    public mixed $timestamps = false

Denotes that timestamps should not be included in the DB table.



* Visibility: **public**


### $fillable

    protected Array $fillable = array("CounsellorID", "StartDate", "EndDate", "ScheduleString")

Eloquent member for storing column names.

Eloquent uses this member to determine which columns are meant to be in the table. In this case the array contains CounsellorID, StartDate, EndDate, and ScheduleString.
This should not be manipulated directly.

* Visibility: **protected**


### $attributes

    protected Array $attributes = array("StartDate" => "2020-01-01", "EndDate" => "2021-01-01", "ScheduleString" => "")

Used to specify the default values of columns.



* Visibility: **protected**


Methods
-------


### GetTimeslots

    Array App\Schedule::GetTimeslots()

Helper function used to get the daily availability arrays.

Parses the ScheduleString and returns an array containing 5 arrays each containing the hours of the day where the counsellor is available.

* Visibility: **public**



