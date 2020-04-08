@extends('layouts.app')

@section('content')

<div class="container">
This page is intended for you to fill in (or update) your professional profile and contact information
 to help match potential clients with your specific skillsets. {{$psychologists}}
    <form action="/psychologists" method="POST">

    </form>
</div>


@endsection