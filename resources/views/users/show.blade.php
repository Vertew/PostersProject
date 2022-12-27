@extends('layouts.app')

@section('title', $user->username)

@section('content')

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <h2>Info</h2>

    <a href="{{route('profiles.show', ['id'=> $user->profile->id])}}">View Profile</a>

    <ul>

        <li>Username: {{$user->username}}</li>

        <li>Email: {{$user->email}}</li>

        <li>Joined: {{$user->created_at}}</li>

    </ul>

    <h3>Roles</h3>

    <ul>

        @foreach ($user->roles as $role)
            <li>{{$role->role}}</li>
        @endforeach

    </ul>

    @if(Auth::id() == $user->id)
        <livewire:notification-form :user="$user">
    @endif

    <h2>Posts</h2>

    <ul>

        @foreach ($user->posts as $post)
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
        @endforeach

    </ul>

    <h2>Comments</h2>

    <ul>

        @foreach ($user->comments as $comment)
            <li>Posted on: <a href = "{{route('posts.show', ['id'=> $comment->post->id])}}">{{$comment->post->title}}</a></li>
            <li><a href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a></li>
        @endforeach

    </ul>

    <h2>Likes</h2>

    <ul>

        @foreach ($user->likes()->get() as $post)
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}">{{$post->title}}</a></li>
        @endforeach

    </ul>

@endsection