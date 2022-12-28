@extends('layouts.app')

@section('title', $profile->user->username)

@section('content')

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <ul>

        @if ($profile->image != null)
            <li> <img src={{ asset('profile_pictures/'.$profile->image->name) }}> </li>
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

@endsection