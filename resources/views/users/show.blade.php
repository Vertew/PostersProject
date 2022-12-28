@extends('layouts.app')

@section('title', $user->username)

@section('content')

    <a href="{{route('profiles.show', ['id'=> $user->profile->id])}}">
        <button type="button">View Profile</button>
    </a>

    <h2>Info</h2>

    <div id = 'main'>
        <h3>General</h3>
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
    </div>

    <h2>Notifications</h2>

    @if(Auth::id() == $user->id)
        <livewire:notification-form :user="$user">
    @endif

    <h2>Posts</h2>

    <div id = 'main'>
        @foreach ($user->posts->sortByDesc('created_at') as $post)
        <ul>
            <li><a style = 'text-align: left' href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
        </ul>
        @endforeach
    </div>

    <h2>Comments</h2>

    <div id = 'main'>
        @foreach ($user->comments->sortByDesc('created_at') as $comment)
        <ul>
            <li><a href = "{{route('posts.show', ['id'=> $comment->post->id])}}">Posted under: {{$comment->post->title}}</a></li>
            <li><a style = 'text-align: left' href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a></li>
        </ul>
        @endforeach
    </div>

    <h2>Likes</h2>

    <div id = 'main'>
        @foreach ($user->likes()->get() as $post)
        <ul>
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}">{{$post->title}}</a></li>
        </ul>
        @endforeach
    </div>

@endsection