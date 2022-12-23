@extends('layouts.app')

@section('title', 'Editing...')

@section('content')

    <form method="POST" action="{{ route('profiles.update' , ['id'=> $profile->id])}}" enctype="multipart/form-data">
        @csrf
        <p>Name: <input type = "text" name = "name" value = "{{$profile->name}}"></p>
        <p>Date of Birth: <input type = "date" name = "date_of_birth" value = "{{$profile->date_of_birth}}"></p>
        <p>Status: <input type = "text" name = "status" value = "{{$profile->status}}"></p>
        <p>Location: <input type = "text" name = "location" value = "{{$profile->location}}"></p>
        <p>Add/change profile picture: <input type = "file" name = "profile_picture"></p>
        <input type="checkbox" id="checkbox2" name = "checkbox">
        <label for="checkbox2">Remove profile picture</label><br>
        <input type = "submit" value = "Post">
        <a href="{{route('profiles.show',['id'=> $profile->id])}}">Cancel</a>
    </form>


@endsection