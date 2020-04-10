@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-12 center-block text-center">
        <h2>Your Appointments</h2>
        <p>Edit or Cancel Your Appointments Here</p>

        @if(!$appointments->isEmpty())

        @switch(auth()->user()->role)

        @case('Counsellor')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Client</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <th scope="row">{{$appointment->date}}</th>
                    <td>{{$appointment->time}}</td>
                    <td>{{$appointment->client->name}}</td>
                    <td>{{$appointment->notes}}</td>
                    <td>
                        {{-- <button type="button" class="btn btn-small btn-primary mr-2">Change</button> --}}
                        <form action="/appointments/{{$appointment->id}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-small btn-danger">Cancel</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        @break

        @case('Client')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Counsellor</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <th scope="row">{{$appointment->date}}</th>
                    <td>{{$appointment->time}}</td>
                    <td><a
                            href='/user/{{$appointment->counsellor->id}}'>{{$appointment->counsellor->name}}</a>
                    </td>
                    <td>
                        <form action="/appointments/edit" method="PATCH">
                            @csrf
                            <input name="appointment_id" type="hidden" value='{{$appointment->id}}'>
                            <button type="submit" class="btn btn-small btn-primary">Change</button>
                        </form>

                        <form action="/appointments/{{$appointment->id}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-small btn-danger">Cancel</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @default
        {{-- Do nothing here  --}}
        @endswitch


        @else
        <p style="color: red">No Appointments To Show</p>
        @endif
    </div>
</div>
@endsection