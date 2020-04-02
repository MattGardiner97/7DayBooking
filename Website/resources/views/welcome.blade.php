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


    @elseif(auth()->user()->role == 'Counsellor')
    {{-- User is a counsellor --}}
    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/Schedule/New" class="btn btn-primary btn-block">New Schedule</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/Schedule/Show" class="btn btn-success btn-block">View Schedule</a>
        </div>
    </div>

    @else
    {{-- User is a guest --}}
    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/appointment/new" class="btn btn-success btn-block">New Appointment</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/appointment/show" class="btn btn-danger btn-block">Cancel / Change Appointment</a>
        </div>
    </div>

    @endif

</div>

@endsection