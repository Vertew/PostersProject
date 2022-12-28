@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div>
        <ul>
            <li><h2>{{$post->title}}</h2></li>
            <li><a href="{{route('users.show', ['id'=> $post->user->id])}}">Poster: {{$post->user->profile->name ?? $post->user->username}} </a></li>
            <li><textarea rows="20" cols="70" readonly >{{$post->post_text}}</textarea></li>
            @if ($post->image != null)
                <li> <img src={{ asset('images/'.$post->image->name) }}> </li>
            @endif
            <li>{{$post->views}} Views</li>
            <li><livewire:like-form :post="$post"> </li>
        </ul>
    </div>

    <a href="{{route('posts.likes', ['id'=> $post->id])}}">
        <button type="button">View Likes</button>
    </a>

    <a href="{{route('posts.edit', ['id'=> $post->id])}}">
        <button type="button">Edit post</button>
    </a>

    <form method="POST" action="{{ route('posts.destroy', ['id'=> $post->id])}}">
        @csrf
        @method('DELETE')
        <input type = "submit" value = "Delete Post">
    </form>


    <livewire:comment-form :post="$post">

@endsection