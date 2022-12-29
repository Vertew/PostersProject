@extends('layouts.app')

@section('title', '- '.$user->username)

@section('content')

    <h1 class = 'text-center display-3'>Info</h1>

    <div class="container-md mt-3 text-center">
        <a  href="{{route('profiles.show', ['id'=> $user->profile->id])}}">
            <button class="btn btn-primary" type="button">View Profile</button>
        </a>
    </div>
    
    <div class="container-md mt-3 mb-3 border text-center">
        <h3>General</h3>
        <ul class = 'list-group'>
            <li class="list-group-item"><strong>User tag: </strong>{{$user->username}}</li>
            <li class="list-group-item"><strong>Email:</strong> {{$user->email}}</li>
            <li class="list-group-item">Joined {{$user->created_at}}</li>
        </ul>

        <h3>Roles</h3>
            @foreach ($user->roles as $role)
                <span class="badge rounded-pill bg-info mb-2">{{$role->role}}</span>
            @endforeach
    </div>

    <div class="container-md mt-3 mb-3 border">
        @if(Auth::id() == $user->id)
            <h2 class = 'text-center'>Notifications</h2>
            <livewire:notification-form :user="$user">
        @endif
    </div>

    <div class="row">
        <div class="col">
            <h2 class = 'display-6 text-center'>Posts</h2>
            @forelse ($user->posts->sortByDesc('created_at') as $post)
                <div class="container-md mt-3">  
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a>
                        <li class="list-group-item">{{$post->created_at}}</li>
                    </div>
                </div>
            @empty
                <p class="text-center">You haven't posted anything yet.</p>
            @endforelse
        </div>
        <div class="col">
            <h2 class = 'display-6 text-center'>Comments</h2>
            @forelse ($user->comments->sortByDesc('created_at') as $comment)
                <div class="container-md mt-3">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href = "{{route('posts.show', ['id'=> $comment->post->id])}}">Posted under: <strong>{{$comment->post->title}}</strong></a>
                        <a class="list-group-item list-group-item-action" href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a>
                        <li class="list-group-item">{{$comment->created_at}}</li>
                    </div>
                </div>
            @empty
                <p class="text-center">You haven't commented on anything yet.</p>
            @endforelse
        </div>
        <div class="col">
            <h2 class = 'display-6 text-center'>Likes</h2>
            @forelse ($user->likes()->get() as $post)
                <div class="container-md mt-3">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href = "{{route('posts.show', ['id'=> $post->id])}}">{{$post->title}}</a>
                        <a class="list-group-item list-group-item-action" href = "{{route('users.show', ['id'=> $post->user->id])}}">By <strong>{{$post->user->username}}</strong></a>
                    </div>
                </div>
            @empty
                <p class= "text-center">You haven't liked anything yet.</p>
            @endforelse
        </div>
      </div>
@endsection