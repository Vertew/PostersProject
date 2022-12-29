@extends('layouts.app')

@section('title', $profile->user->username)

@section('content')

    <div class="container-md mt-3 text-center">
        <ul>
            @if ($profile->image != null)
                <li> <img class="img-thumbnail img-fluid" src={{ asset('profile_pictures/'.$profile->image->name) }}> </li>
            @endif
            @if ($profile->name != null)
                <li>Name: {{$profile->name ?? 'Anonymous'}}</li>
            @endif
            @if ($profile->status != null)
                <li>Status: {{$profile->status}}</li>
            @endif
            @if ($profile->location != null)
                <li>Location: {{$profile->location}} </li>
            @endif
            @if ($profile->date_of_birth != null)
                <li>Date of Birth: {{$profile->date_of_birth}}</li>
            @endif  
            <li>Email: {{$profile->user->email}}</li>
        </ul>
        <a href="{{route('profiles.edit', ['id'=> $profile->id])}}">
            <button type="button">Edit profile</button>
        </a>
    </div>

@endsection