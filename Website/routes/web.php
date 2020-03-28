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
    return view('index');
});

Route::get("/Schedule/Show","ScheduleController@GetSchedules");
Route::get("/Schedule/Update","ScheduleController@UpdateSchedule_Get");
Route::post("/Schedule/Update","ScheduleController@UpdateSchedule_Post");
Route::get("/Schedule/New", "ScheduleController@CreateSchedule");
Route::get("/Schedule/Delete","ScheduleController@DeleteSchedule");