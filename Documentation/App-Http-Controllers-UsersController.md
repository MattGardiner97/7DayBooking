App\Http\Controllers\UsersController
===============

Controller class for performing account management tasks.




* Class name: UsersController
* Namespace: App\Http\Controllers
* Parent class: [App\Http\Controllers\Controller](App-Http-Controllers-Controller.md)







Methods
-------


### __construct

    void App\Http\Controllers\UsersController::__construct()

Create a new controller instance.



* Visibility: **public**




### show

    \App\Http\Controllers\View App\Http\Controllers\UsersController::show(\App\User $user)

GET endpoint for displaying the account management page.

Returns the index view populated with the current user.

* Visibility: **public**


#### Arguments
* $user **[App\User](App-User.md)** - &lt;p&gt;The currently logged in user.&lt;/p&gt;



### searchBy

    \App\Http\Controllers\View App\Http\Controllers\UsersController::searchBy()

GET endpoint for displaying the counsellor search page.



* Visibility: **public**




### searchByResults

    \App\Http\Controllers\View. App\Http\Controllers\UsersController::searchByResults(\Illuminate\Http\Request $request)

GET endpoint for performing a keyword search.

Searches through all counsellors in the database and returns those whose biographies or names contain at least a partial match for the search term.
Returns a view containing all counsellors that match the search.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request object containing the search term.&lt;/p&gt;



### showAllCounsellors

    \App\Http\Controllers\View App\Http\Controllers\UsersController::showAllCounsellors()

GET endpoint for displaying the all counsellors page.

Returns a view populated with each counsellor and their details.

* Visibility: **public**




### profile

    \App\Http\Controllers\View App\Http\Controllers\UsersController::profile(\App\User $user)

GET endpoint for displaying the profile overview page.

Returns the main profile view which allows users to edit their details.

* Visibility: **public**


#### Arguments
* $user **[App\User](App-User.md)** - &lt;p&gt;The currently logged-in user.&lt;/p&gt;



### update

    \App\Http\Controllers\View App\Http\Controllers\UsersController::update(\Illuminate\Http\Request $request)

POST endpoint for updating user details.

Updates the user details based on the inputs provided. Redirects to the profile overview page upon completion.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request** - &lt;p&gt;HTTP request object containing the user ID, password, name, email, and biograpy paramaters.&lt;/p&gt;


