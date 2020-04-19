@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/users/update/{{$user->id}}" method="POST">
        @method('PATCH')
        <input name="id" type="hidden" value="{{auth()->user()->id}}" />
        <div class="form-group">
            <label><span class="fa fa-info-circle" data-placement="top"></span>Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label><span class="fa fa-info-circle" data-placement="top"></span>Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label><span class="fa fa-info-circle" data-placement="top"></span>Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        @if (auth()->user()->role == "Counsellor")
        <div class="form-group">
            <label><span class="fa fa-info-circle" data-placement="top"></span>Biography</label>
            <textarea class="form-control" name="biography" id="biography">{{$user->biography}}</textarea>
        </div>
        
        @endif
        <div class="form-group">
            {{--<button class="btn btn-danger my-2 my-sm-0" name="Cancel" value="Cancel">Cancel</button>--}}
            <button class="btn btn-success my-2 my-sm-0" type="Save" name="Save" value="Submit">Save</button>
        </div>  
    </form>
</div>

@endsection