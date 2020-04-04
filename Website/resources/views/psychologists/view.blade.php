@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        
        <h2>Accomplishments for {{$counseller->name ?? ''}}</h2>
        <p></p>
        <p>{{$bio->details}}&nbsp;</p>
        
         
    </div>
    
</div>

@endsection