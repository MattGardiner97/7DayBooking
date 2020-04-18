@extends('layouts.app')

@section('content')

<div class="container">
    @if (auth()->user()->id == $counsellor->id)
This page is intended for you to fill in (or update) your professional profile and contact information
 to help match potential clients with your specific skillsets. 
    <form action="/users/edit/" method="post">
        <input type='hidden' name='id' value='{{$counsellor->id}}'>
        <table>
            <tbody>
                <tr><td valign='top'><label for='biography'>Biography:&nbsp;</label></td>
                    <td><textarea name='biography' cols='50'>{{$counsellor->biography}}</textarea></td>
                </tr>
        
            </tbody>

        </table>
       
            <button type="submit" class="btn btn-small btn-danger">Update</button>
    </form>
    @else
    <p>An error has occured please go <a href='javascript:history.go(-1);'>back</a></p>
    @endif
</div>


@endsection