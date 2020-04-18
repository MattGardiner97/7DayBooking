@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        
        <h2>{{$counsellor->name ?? ''}}</h2>
        <br>
        <p>{{$counsellor->biography}}</p>
         
        @if (auth()->user()->id == $counsellor->id)
        <div class="col-sm-6 center-block text-center mt-5">
        <a href="/users/edit/{{$counsellor->id}}" class="btn btn-primary btn-block">Edit Biography</a>
        </div>
        @endif
    </div>
    
</div>

@endsection