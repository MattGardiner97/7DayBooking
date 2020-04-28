App\User
===============

Model class representing a logged-in (non-anonymous) user of the website.




* Class name: User
* Namespace: App
* Parent class: Illuminate\Foundation\Auth\User





Properties
----------


### $fillable

    protected Array $fillable = array('name', 'email', 'password', "requested_verification", 'biography')

Eloquent member for storing column names.

Eloquent uses this member to determine which columns are meant to be in the table. In this case the array contains name, email, password, requested_verification, and biography.
This should not be manipulated directly.

* Visibility: **protected**


### $hidden

    protected Array $hidden = array('password', 'remember_token')

The attributes that should be hidden for arrays.



* Visibility: **protected**


### $casts

    protected Array $casts = array('email_verified_at' => 'datetime')

The attributes that should be cast to native types.



* Visibility: **protected**


### $attributes

    protected Array $attributes = array("role" => "Client", "requested_verification" => 0)

Determines the default values to be assigned to the specified columns.



* Visibility: **protected**


Methods
-------


### appointment

    Array App\User::appointment()

Foreign key relationship representing all appointments belonging to a user.



* Visibility: **public**



