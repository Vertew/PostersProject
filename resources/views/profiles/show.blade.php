@extends('layouts.app')

@section('title', '- '.$profile->user->username)

@section('content')

    <div class="container-md mt-3 text-center">
        <ul class = 'list-group'>
            @if ($profile->image != null)
                <li class="list-group-item"> <img class="img-thumbnail img-fluid" src={{ asset('profile_pictures/'.$profile->image->name) }}> </li>
            @endif
            @if ($profile->name != null)
                <li class="list-group-item">Name: {{$profile->name ?? 'Anonymous'}}</li>
            @endif
            @if ($profile->status != null)
                <li class="list-group-item">Status: {{$profile->status}}</li>
            @endif
            @if ($profile->location != null)
                <li class="list-group-item">Location: {{$profile->location}} </li>
            @endif
            @if ($profile->date_of_birth != null)
                <li class="list-group-item">Date of Birth: {{$profile->date_of_birth}}</li>
            @endif  
            <li class="list-group-item">Email: {{$profile->user->email}}</li>
        </ul>
        <a href="{{route('profiles.edit', ['id'=> $profile->id])}}">
            <button class="btn btn-primary mt-2" type="button">Edit profile</button>
        </a>
    </div>

@endsection