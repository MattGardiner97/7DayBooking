@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
    If you can not find a counsellor that matches your needs, please try using search<br>
    <form method='post' action='/users/search'>
    <div class="form-group">
        
        <label><span class="fa fa-info-circle" data-placement="top"></span>Terms</label>
        <input type="text" class="form-control" name="search" id="name" value="">
    </div> 
    

        <button class="btn btn-success my-2 my-sm-0" type="Save" name="Search" value="Submit">Search</button>
    </form>
    </div>
    
</div>

@endsection