<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Home page
Route::get('/home', 'HomeController@index')->name('home');

//Scheduling routes
Route::get("/schedules/show","SchedulesController@Show");
Route::get("/schedules/update","SchedulesController@Update_Get");
Route::get("/schedules/new","SchedulesController@New");
Route::post("/schedules/update","SchedulesController@Update_Post");
Route::post("/schedules/create", "SchedulesController@Create");
Route::get("/schedules/delete","SchedulesController@Delete");

//Appointment routes
Route::get('/appointments/new', 'AppointmentsController@create');
Route::post('/appointments', 'AppointmentsController@store');
Route::get('/appointments/show', 'AppointmentsController@show_all');
Route::get('/appointments/showcounsellor', 'AppointmentsController@show_allCounsellor');
Route::delete('appointments/delete/{appointments}', 'AppointmentsController@destroy');
//Route::get('/appointments/delete', 'AppointmentsController@destroy');
Route::get("/appointments/getavailabletimeslots","AppointmentsController@GetAvailableTimeslots");

//counsellor bio info
Route::get('/counsellors/show', 'BiographysController@show');
Route::get('/counsellors/new', 'BiographysController@create');
Route::get('/psychologists/show/{user}', 'BiographysController@show_2');

//User routes
Route::get('/user/{user}', 'UsersController@show');
Route::get('/user/new', 'UsersController@new');

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Admin pages
Route::get("/admin","AdminController@Index");
Route::get("/admin/verify","AdminController@Verify_Get");
Route::post("/admin/verify","AdminController@Verify_Post");
Route::post("/admin/deny","AdminController@Deny_Post");
