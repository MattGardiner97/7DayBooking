App\Http\Controllers\Auth\RegisterController
===============






* Class name: RegisterController
* Namespace: App\Http\Controllers\Auth
* Parent class: [App\Http\Controllers\Controller](App-Http-Controllers-Controller.md)





Properties
----------


### $redirectTo

    protected string $redirectTo = \App\Providers\RouteServiceProvider::HOME

Where to redirect users after registration.



* Visibility: **protected**


Methods
-------


### __construct

    void App\Http\Controllers\Auth\RegisterController::__construct()

Create a new controller instance.



* Visibility: **public**




### validator

    \Illuminate\Contracts\Validation\Validator App\Http\Controllers\Auth\RegisterController::validator(array $data)

Get a validator for an incoming registration request.



* Visibility: **protected**


#### Arguments
* $data **array**



### create

    \App\User App\Http\Controllers\Auth\RegisterController::create(array $data)

Create a new user instance after a valid registration.



* Visibility: **protected**


#### Arguments
* $data **array**


