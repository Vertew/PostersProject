@extends('layouts.app')

@section('title', $user->username)

@section('content')

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <ul>

        <li>Username: {{$user->username}}</li>

        <li>Email: {{$user->email}}</li>

        <li>Name: {{$user->profile->name ?? 'Anonymous'}}</li>

        <li>Joined: {{$user->created_at}}</li>

    </ul>

    <a href="{{route('posts.index')}}">
        <button type="button">Return</button>
    </a>

    <h2>Posts</h2>

    <ul>

        @foreach ($posts as $post)
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
        @endforeach

    </ul>

@endsection