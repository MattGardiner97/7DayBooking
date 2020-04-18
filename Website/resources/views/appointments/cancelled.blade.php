@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        <h2 class="text-danger">Appointment Cancelled</h2>
        <p>Your appointment for {{ $appointment->date }} at {{ $appointment->time }} with
            {{ $appointment->counsellor->name }} has been cancelled. </p>
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