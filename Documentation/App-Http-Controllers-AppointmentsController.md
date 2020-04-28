App\Http\Controllers\AppointmentsController
===============

Controller class for handing appointment related tasks.

Provides endpoints for retrieving appointment booking views and creating new appointments.


* Class name: AppointmentsController
* Namespace: App\Http\Controllers
* Parent class: [App\Http\Controllers\Controller](App-Http-Controllers-Controller.md)







Methods
-------


### __construct

    mixed App\Http\Controllers\AppointmentsController::__construct()





* Visibility: **public**




### create

    \App\Http\Controllers\View App\Http\Controllers\AppointmentsController::create()

GET endpoint for retrieving the new appointment page.

Returns the new appointment view populated with all counsellors.

* Visibility: **public**




### all

    \App\Http\Controllers\View App\Http\Controllers\AppointmentsController::all()

GET endpoint for retrieving the all appointments page.

Returns a view displaying all appointments for a user. If the user is a client, it displays all appointments made by that client. If the user is a counsellor,
it displays all appointments for that counsellor.

* Visibility: **public**




### store

    void App\Http\Controllers\AppointmentsController::store(\Illuminate\Http\Request $request)

POST endpoint for storing a new appointment in the database.

This function creates or updates an appointment depending on what data is submitted. If no ID is specified in the request form, a new appointment will be created,
otherwise the existing appointment will be updated.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;The framework provided HTTP request.&lt;/p&gt;



### destroy

    void App\Http\Controllers\AppointmentsController::destroy(\App\Appointment $appointment)

DELETE endpoint for removing an appointment from the database

Deletes an existing appointment from the database and sends an email notification to the client notifying them of the cancellation.

* Visibility: **public**


#### Arguments
* $appointment **[App\Appointment](App-Appointment.md)** - &lt;p&gt;Framework-generated model binding representing the appointment to delete.&lt;/p&gt;



### edit

    void App\Http\Controllers\AppointmentsController::edit(\App\Appointment $appointment)

GET endpoint for retrieving the edit appointment page.

Returns the edit appointment page populated with the existing appointment and all counsellors.

* Visibility: **public**


#### Arguments
* $appointment **[App\Appointment](App-Appointment.md)** - &lt;p&gt;Framework-generated model binding representing the appointment to edit.&lt;/p&gt;



### GetAvailableTimeslots

    Array App\Http\Controllers\AppointmentsController::GetAvailableTimeslots(\Illuminate\Http\Request $request)

GET endpoint for retrieving available timeslots for a specified counsellor and date.

Returns a JSON encoded array of integers representing available appointment times for a given day and time. Returns an empty response if there are no times available.
Designed to be consumed by an AJAX request.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request containing the counsellor ID and date to search for.&lt;/p&gt;



### validateRequest

    Array App\Http\Controllers\AppointmentsController::validateRequest()

Internal function to validate that required request parameters are present

Returns an array containing the valid paramaters. If any paramaters fail validation, the previous page is autmatically returned containing the validation errors.

* Visibility: **protected**




### sendEmail

    void App\Http\Controllers\AppointmentsController::sendEmail(string $to_email, $to_name, \App\Http\Controllers\View $view, Array $data, string $subject)

Helper function used to send email using the default mail provider.



* Visibility: **protected**


#### Arguments
* $to_email **string** - &lt;p&gt;The email address of the recipient&lt;/p&gt;
* $to_name **mixed**
* $view **App\Http\Controllers\View** - &lt;p&gt;The blade view to be displayed in the body of the message&lt;/p&gt;
* $data **Array** - &lt;p&gt;Any data required by the view&lt;/p&gt;
* $subject **string** - &lt;p&gt;The text to be sent in the subject line of the email&lt;/p&gt;


