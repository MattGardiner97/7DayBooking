@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        <h2 class="text-warning">Appointment Changed</h2>
        <p>Your appointment has been changed. Here are the new details; </p>
        <br>
        <p>Date: {{ $appointment->$date }}</p>
        <p>Time: {{ $appointment->$time }}</p>
        <p>Counsellor: {{ $appointment->$counsellor }}</p>
        
    </div>

    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/" class="btn btn-primary btn-block">Go Home</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/appointments/show" class="btn btn-success btn-block">Show Appointments</a>
        </div>
    </div>

</div>

@endsection