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
Route::post('NewAppointment', 'AppointmentController@StoreAppointment');

// ========== ROUTES FOR COUNSELLOR INFO ========== //
Route::get('/user/{user}', 'UsersController@show');
// ========== END ROUTES FOR COUNSELLOR INFO ========== //

// ========== ROUTES FOR REGISTRATION / LOGIN / RESET ========== //

// - Only enable ones necessary

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// ========== END ROUTES FOR REGISTRATION / LOGIN / RESET ========== //
