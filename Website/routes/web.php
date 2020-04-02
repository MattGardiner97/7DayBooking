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

Route::get("/Schedule/Show","ScheduleController@GetSchedules");
Route::get("/Schedule/Update","ScheduleController@UpdateSchedule_Get");
Route::post("/Schedule/Update","ScheduleController@UpdateSchedule_Post");
Route::get("/Schedule/New", "ScheduleController@CreateSchedule");
Route::get("/Schedule/Delete","ScheduleController@DeleteSchedule");

Route::get('/home', 'HomeController@index')->name('home');

Route::get('NewAppointment', 'AppointmentController@CreateAppointment');
// Route::get('appointment/new', 'AppointmentController@create');
Route::post('NewAppointment', 'AppointmentController@StoreAppointment');
Route::post('appointment', 'AppointmentController@store');

Route::get('/appointment/show', 'AppointmentController@show_all');
Route::delete('appointment/{appointment}', 'AppointmentController@destroy');

Route::get('/user/{user}', 'UsersController@show');
Route::get('/user/new', 'UsersController@new');

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


