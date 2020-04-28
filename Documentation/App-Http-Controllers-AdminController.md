App\Http\Controllers\AdminController
===============

Controller class for handling admin related tasks.

Provides endpoints for managing user account status.


* Class name: AdminController
* Namespace: App\Http\Controllers
* Parent class: [App\Http\Controllers\Controller](App-Http-Controllers-Controller.md)







Methods
-------


### __construct

    mixed App\Http\Controllers\AdminController::__construct()





* Visibility: **public**




### Index

    \App\Http\Controllers\View App\Http\Controllers\AdminController::Index()

GET endpoint for retrieving the admin dashboard page,

Returns the index view populated with any accounts which are awaiting counsellor verification.

* Visibility: **public**




### Verify_Get

    \App\Http\Controllers\View App\Http\Controllers\AdminController::Verify_Get()

GET endpoint for retrieving the user verification page,

Returns the user verification page populated with any accounts awaiting verification,

* Visibility: **public**




### Verify_Post

    void App\Http\Controllers\AdminController::Verify_Post(\Illuminate\Http\Request $request)

POST endpoint for verifying user accounts.

Sets the user's role to counsellor and clears the requested verification flag from their account.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request containing the user ID to verify.&lt;/p&gt;



### Deny_Post

    void App\Http\Controllers\AdminController::Deny_Post(\Illuminate\Http\Request $request)

POST endpoint for denying user verificaiton requests

Sets the user's role to client and clears the request verification flag from their account

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request containing the user ID to deny.&lt;/p&gt;


