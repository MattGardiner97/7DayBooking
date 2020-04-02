@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        <h2>Welcome To 7Day Psychology Online Booking</h2>
        <p>Please either register or login to make an appointment</p>
    </div>

    @if(Auth::guest())

    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/register" class="btn btn-primary btn-block">Register</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/login" class="btn btn-success btn-block">Login</a>
        </div>
    </div>

    @else

    {{-- Nede an if case the user is a psychologist - they will have a different menu to generic clients--}}
    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="NewAppointment" class="btn btn-success btn-block">New Appointment</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/appointment/show" class="btn btn-danger btn-block">Cancel / Change Appointment</a>
        </div>
    </div>

    @endif

</div>

@endsection