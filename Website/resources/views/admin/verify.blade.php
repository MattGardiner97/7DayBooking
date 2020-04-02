@extends('layouts.app') @section('content') @php $color = count($users) == 0 ? "lime" : "red"; @endphp

<div class="container">
    <h1>Verification Requests
        <span id="UserCount" style="color:{{$color}}; font-weight:bold">{{count($users)}}</span>
    </h1>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Approve</th>
            <th>Deny</th>
        </tr>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><button class="btn btn-primary">Approve</button></td>
                    <td><button class="btn btn-danger">Deny</button></td>
                </tr>
            @endforeach
        </tbody>
    </thead>

</table>
</div>

@endsection