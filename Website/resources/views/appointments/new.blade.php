@extends('layouts.app')

@section('content')
<div class="container">
    @if(!$appointments->isEmpty())
    <form action="/appointment" method="POST">
        <input name="client_id" type="hidden" value="{{auth()->user()->id}}" />
        <div class="col-sm-12 center-block text-center mt-5">
            <div class="col-md" style="margin: auto">
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Select Counsellor</label>
                    <select class="form-control" name="psychologist_id">
                        @foreach($psychologists as $psychologist)
                        <option value="{{$psychologist->id}}">{{$psychologist->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Enter Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group">
                    <label><span class="fa fa-info-circle" data-placement="top"></span>Select Time</label>
                    <select class="form-control" name="time">
                        <option value="9">9am</option>
                        <option value="10">10am</option>
                        <option value="11">11am</option>
                        <option value="12">12am</option>
                        <option value="13">1pm</option>
                        <option value="14">2pm</option>
                        <option value="15">3pm</option>
                        <option value="16">4pm</option>
                        <option value="17">5pm</option>
                    </select>
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