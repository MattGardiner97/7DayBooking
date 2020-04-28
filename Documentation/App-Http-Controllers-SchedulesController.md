App\Http\Controllers\SchedulesController
===============

Controller class for handling schedule related tasks.

Allows counsellors to specify their appointment availability.


* Class name: SchedulesController
* Namespace: App\Http\Controllers
* Parent class: [App\Http\Controllers\Controller](App-Http-Controllers-Controller.md)







Methods
-------


### __construct

    mixed App\Http\Controllers\SchedulesController::__construct()





* Visibility: **public**




### Show

    \App\Http\Controllers\View App\Http\Controllers\SchedulesController::Show(\Illuminate\Http\Request $request)

GET endpoint for displaying all schedules for a counsellor.

Returns the show schedule page populated with all schedules for a specified counsellor.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request object containing the ID of the user to display schedules for.&lt;/p&gt;



### NewSchedule

    \App\Http\Controllers\View App\Http\Controllers\SchedulesController::NewSchedule(\Illuminate\Http\Request $request)

GET endpoint for displaying the new schedule page.

Returns the new schedule view.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request object.&lt;/p&gt;



### Create

    \App\Http\Controllers\View App\Http\Controllers\SchedulesController::Create(\Illuminate\Http\Request $request)

POST endpoint for creating a new schedule.

Creates a new schedule with the specified counsellor ID, start date, and end date. Redirects to the edit schedule page after completion.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request object containing the counsellor ID, start date, and end date.&lt;/p&gt;



### Update_Get

    \App\Http\Controllers\View App\Http\Controllers\SchedulesController::Update_Get(\Illuminate\Http\Request $request)

GET endpoint for retrieving the update schedule page.

Returns the update view for the specified schedule.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request object containing the ID of the schedule to be updated.&lt;/p&gt;



### Update_Post

    \App\Http\Controllers\View App\Http\Controllers\SchedulesController::Update_Post(\Illuminate\Http\Request $request)

POST endpoint for updating a schedule.

Updates the specified schedule with the new details in the request. Redirects to the all schedules page upon completion.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request containing the schedule ID, start date, end date, and specially formatted schedule string.&lt;/p&gt;



### Delete

    \App\Http\Controllers\View App\Http\Controllers\SchedulesController::Delete(\Illuminate\Http\Request $request)

DELETE endpoint for deleting a specified schedule.

Deletes the schedule from the database specified by the schedule ID. Redirects to the all schedules page upon completion.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request object containing the ID of the schedule to be deleted.&lt;/p&gt;


