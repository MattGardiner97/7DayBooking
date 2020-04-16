@extends('layouts.app')

@section('scripts')
<script src="/js/appointment/edit.js"></script>
@endsection

@section('content')


<div class="container" style="float: left; width: 60%; margin-top:-1%">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(!$counsellors->isEmpty())
    <form action="/appointments/update" method="POST">
        @method('PATCH')
        <input name="client_id" type="hidden" value="{{auth()->user()->id}}" />
        <input name="appointment_id" type="hidden" value="{{$appointment->id}}" />
        <div class="col-sm-12 center-block text-center mt-5">
            <div class="col-md" style="margin: auto">
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Select Counsellor</label>
                    <select class="form-control" name="counsellor_id" id="txtCounsellor">
                        @foreach($counsellors as $counsellor)
                            <option value="{{$counsellor->id}}">{{$counsellor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Enter Date</label>
                    <input type="date" name="date" class="form-control" id="dateSelect" onchange="appointmentDate_changed(this)">
                </div>
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Select Time</label>
                    <select class="form-control" name="time" id="selectTime">

                    </select>
                    <div class="text-danger d-none" id="timeError">There are no appointments available on this date.</div>
                </div>
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Enter Notes</label>
                    <textarea name="notes" class="form-control"> {{$appointment->notes}} </textarea>
                </div>
                <div class="form-group">
                    {{--<button class="btn btn-danger my-2 my-sm-0" name="Cancel" value="Cancel">Cancel</button>--}}
                    <button class="btn btn-success my-2 my-sm-0" type="Save" name="Save" value="Submit">Save</button>
                </div>    
            </div>
        </div>
    </form>
    @else
    <p>There is an error with the system. Please contact the admin. </p>
    @endif
</div>
<aside style="float:right; width: 30%; margin-top: 2%">
    <p>
        Current counsellor is: {{$counsellor->name}} <br />
        Current appointment date is : {{$appointment->date}} <br />
        Current appointment time is: {{$appointment->time}} <br />
    </p>
</aside>

@endsection