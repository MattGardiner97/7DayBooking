@extends('layouts.app')


@section('scripts')
<script src="/js/appointment/new.js"></script>
@endsection


@section('content')

<div class="container">
    @if(!$counsellors->isEmpty())
    <form action="/appointments" method="POST">
        <input name="client_id" type="hidden" value="{{auth()->user()->id}}" />
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
                    <input type="date" name="date" class="form-control" id="dateSelect">
                </div>
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Select Time</label>
                    <select class="form-control" name="time" id="selectTime">
                        
                    </select>
                    <div class="text-danger d-none" id="timeError">There are no appointments available on this date.</div>
                </div>
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Enter Notes</label>
                    <textarea name="notes" class="form-control"> </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"
                        value="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
    @else
    <p>There is an error with the system. Please contact the admin. </p>
    @endif

</div>
@endsection