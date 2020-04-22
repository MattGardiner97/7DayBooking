@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        <h2>Welcome To 7Day Psychology Online Booking</h2>
        <p>Please either register or login to make an appointment</p>
    </div>

    @if(Auth::guest())
    {{-- User is not logged in - can't get role --}}
    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/register" class="btn btn-primary btn-block">Register</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/login" class="btn btn-success btn-block">Login</a>
        </div>
    </div>

    @else
    {{-- User is logged in, check role --}}

    @switch(auth()->user()->role)

    @case('Counsellor')
    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/schedules/new" class="btn btn-primary btn-block">New Schedule</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/schedules/show" class="btn btn-success btn-block">View Schedule</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/appointments/show" class="btn btn-primary btn-block"> View Appointments</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/users/profile" class="btn btn-primary btn-block">User Profile</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/users/list" class="btn btn-primary btn-block">View Our Counsellors</a>
        </div>
            
    </div>
    @break

    @case('Admin')
    <div class="row">
        <div class="col-sm-12 center-block text-center mt-5">
            @php
            $users = App\User::where("requested_verification", 1)->get();
            $color = count($users) == 0 ? "lime" : "red";
            @endphp
            <h4>Verification Requests <span style="color:{{$color}}; font-weight:bold">{{count($users)}}</span></h4>
            <a class="btn btn-primary" href="/admin/verify">View</a>
        </div>
    </div>
    @break

    @case('Client')
    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/appointments/new" class="btn btn-success btn-block">New Appointment</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/appointments/show" class="btn btn-danger btn-block">Cancel / Change Appointment</a>
        </div>
        
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/users/profile" class="btn btn-primary btn-block">User Profile</a>
        </div>
 
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/users/list" class="btn btn-primary btn-block">View Our Counsellors</a>
        </div>

    </div>
    @break

    @default
    <p>Something went wrong</p>
    @endswitch

    @endif


</div>

@endsection