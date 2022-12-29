@extends('layouts.app')

@section('title', $user->username)

@section('content')

    <h2 class = 'text-center'>Info</h2>

    <div class="container-md mt-3 border text-center">
        <h3 >General</h3>
        <ul>
            <li>Username: {{$user->username}}</li>
            <li>Email: {{$user->email}}</li>
            <li>Joined: {{$user->created_at}}</li>
        </ul>

        <h3>Roles</h3>
            @foreach ($user->roles as $role)
                <span class="badge rounded-pill bg-info">{{$role->role}}</span>
            @endforeach
    </div>

    <div class="container-md mt-3 text-center">
        <a  href="{{route('profiles.show', ['id'=> $user->profile->id])}}">
            <button type="button">View Profile</button>
        </a>
    </div>

    @if(Auth::id() == $user->id)
        <h2 class = 'text-center'>Notifications</h2>
        <livewire:notification-form :user="$user">
    @endif

    <div class="row">
        <div class="col">
            <h2 class = 'text-center'>Posts</h2>
            @foreach ($user->posts->sortByDesc('created_at') as $post)
            <div class="container-md mt-3 border">  
                <p class = 'text-center'><a style = 'text-align: left' href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></p>
            </div>
            @endforeach
        </div>
        <div class="col">
            <h2 class = 'text-center'>Comments</h2>
            <div id = 'main'>
                @foreach ($user->comments->sortByDesc('created_at') as $comment)
                <div class="container-md mt-3 border">
                    <ul>
                        <li><a href = "{{route('posts.show', ['id'=> $comment->post->id])}}">Posted under: {{$comment->post->title}}</a></li>
                        <li><a style = 'text-align: left' href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a></li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col">
            <h2 class = 'text-center'>Likes</h2>
            @foreach ($user->likes()->get() as $post)
            <div class="container-md mt-3 border">  
                <a href = "{{route('posts.show', ['id'=> $post->id])}}">{{$post->title}}</a>
            </div>
            @endforeach
        </div>
      </div>
@endsection