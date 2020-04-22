@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        
        <h2>{{$counsellor->name ?? ''}}</h2>
        <br>
        <p>{{$counsellor->email}}</p>
        <p>{{$counsellor->biography}}</p>
         
       
    </div>
    
</div>

@endsection