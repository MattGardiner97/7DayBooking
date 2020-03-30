@extends('layouts.app')

@section('content')

<div class="container">

    <!--@if(Auth::guest()) -->
    <div class="col-sm-6 center-block text-center mt-5">
        <a href="">You need to register or login</a>
    </div>

    <!--@else -->
    <div class="col-sm-6 center-block text-center mt-5">
        SUCCESS!!
    </div>

</div>