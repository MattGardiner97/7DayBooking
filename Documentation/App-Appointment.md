App\Appointment
===============

Model class repsenting a valid appointment made by a client.




* Class name: Appointment
* Namespace: App
* Parent class: Illuminate\Database\Eloquent\Model





Properties
----------


### $fillable

    protected Array $fillable = array("client_id", "counsellor_id", "date", "time", "notes")

Eloquent member for storing column names.

Eloquent uses this member to determine which columns are meant to be in the table. In this case the array contains client_id, counsellor_id, date, time, and notes.
This should not be manipulated directly.

* Visibility: **protected**


Methods
-------


### client

    \App\User App\Appointment::client()

Foreign key relationship representing the client who made the appointment.



* Visibility: **public**




### counsellor

    \App\User App\Appointment::counsellor()

Foreign key relationship representing the counsellor who the appointment is with.



* Visibility: **public**



