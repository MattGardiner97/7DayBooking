@extends('layouts.app')

@section('content')

<div class="container">

    @if(Auth::guest())
    <div class="col-sm-12 center-block text-center">
        <h2>Welcome To 7Day Psychology Online Booking</h2>
        <p>Please either register or login to make an appointment</p>
    </div>

    <div class="row">
        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/register" class="btn btn-primary btn-block">Register</a>
        </div>

        <div class="col-sm-6 center-block text-center mt-5">
            <a href="/login" class="btn btn-success btn-block">Login</a>
        </div>
    </div>
    @endif

</div>

@endsection