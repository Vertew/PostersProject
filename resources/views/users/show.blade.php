@extends('layouts.app')

@section('title', $user->username)

@section('content')

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <a href="{{route('profiles.show', ['id'=> $user->profile->id])}}">View Profile</a>

    <ul>

        <li>Username: {{$user->username}}</li>

        <li>Email: {{$user->email}}</li>

        <li>Joined: {{$user->created_at}}</li>

    </ul>

    <h2>Roles</h2>

    <ul>

        @foreach ($user->roles as $role)
            <li>{{$role->role}}</li>
        @endforeach

    </ul>

    <a href="{{route('posts.index')}}">
        <button type="button">Return</button>
    </a>

    <h2>Posts</h2>

    <ul>

        @foreach ($user->posts as $post)
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
        @endforeach

    </ul>

@endsection