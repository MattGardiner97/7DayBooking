@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
    Please view our Counsellor's to find a match for your requirements. Or&nbsp;<a button type="button" class="btn btn-primary btn-sm" href='/users/search'>Search</a><br> 
    @if (!empty($counsellors))
    <table class="table table-hover">
        <thead>
            <td>Name</td>
            <td>Email</td>
            <td>Biography(short)</td>
        </thead>
        <tbody>
        @foreach ($counsellors as $counsellor )
        <tr>
            <td><a href='/users/show/{{$counsellor->id}}'>{{$counsellor->name}}</a></td>
            <td>{{$counsellor->email}}</td>
            <td>{{$counsellor->biography}}</td>
        </tr>
        @endforeach
        </tbody>

        
       
            
    </table>
    @else
    An error has occured please go <a href='javascript:history.go(-1);'>back</a>
    </div>
    @endif
</div>


@endsection