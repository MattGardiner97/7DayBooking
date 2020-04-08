@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        
        <h2>Professional biography for {{$counseller->name ?? ''}}</h2>
        <p></p>
        @if ($counseller->biography)
        <p>{{$counseller->biography}}&nbsp;</p>
        @else
        <p>No biography information for {{$counseller->name}} given</p>
        @endif
        
         
    </div>
    
</div>

@endsection