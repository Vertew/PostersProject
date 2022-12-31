@extends('layouts.app')

@section('title', '- '.$post->title)

@section('content')
    <div class="container-md mt-3 text-center">  
        <div class="list-group">
            <li class="list-group-item" ><h2 class='display-6'>{{$post->title}}</h2></li>
            <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $post->user->id])}}">
                <strong>{{$post->user->profile->name ?? $post->user->username}}</strong>
            </a>
            <textarea class="list-group-item" rows="10" readonly >{{$post->post_text}}</textarea>
            @if ($post->image != null)
                <li class="list-group-item" > <img src={{ asset('images/'.$post->image->name) }}> </li>
            @endif
            <li class="list-group-item" >{{$post->views}} Views</li>
            <li class="list-group-item" ><livewire:like-form :post="$post"></li>
        </div>
    </div>
    <div class="container-md mt-3 text-center">  
        <a href="{{route('posts.likes', ['id'=> $post->id])}}">
            <button class="btn btn-primary mb-2" type="button">View Likes</button>
        </a>
        <a href="{{route('posts.edit', ['id'=> $post->id])}}">
            <button class="btn btn-secondary mb-2" type="button">Edit post</button>
        </a>
        <form method="POST" action="{{ route('posts.destroy', ['id'=> $post->id])}}">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type = "submit" value = "Delete Post">
        </form>
    </div>
    <livewire:comment-form :post="$post">
@endsection

