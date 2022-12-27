@extends('layouts.app')

@section('title', 'Comment')

@section('content')

    <a href="{{route('posts.show', ['id'=> $comment->post->id])}}">
        <button type="button">See Post</button>
    </a>

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <ul>

        <li><a href="{{route('users.show', ['id'=> $comment->user->id])}}">Poster: {{$comment->user->profile->name ?? $comment->user->username}} </a></li>

        <li>{{$comment->comment_text}}</li>

        <li>Views: {{$comment->views}}</li>

    </ul>

    <a href="{{route('comments.edit', ['id'=> $comment->id])}}">
        <button type="button">Edit comment</button>
    </a>

    <form method="POST" action="{{ route('comments.destroy', ['id'=> $comment->id])}}">
        @csrf
        @method('DELETE')
        <input type = "submit" value = "Delete Comment">
    </form>

@endsection