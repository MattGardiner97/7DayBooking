@extends('layouts.app')

@section('content')

<div class="container">

    <div class="col-sm-12 center-block text-center">
        
        <h2>Accomplishments for {{$counseller[0]->name ?? ''}}</h2>
        <p></p>
        <p>{{$bio[0]->details}}&nbsp;</p>
        
         
    </div>
    
</div>

@endsection