@extends('layouts.app')

@section('title', 'Comment')

@section('content')

    <div id = 'main'>
        <ul>
            <li><a href="{{route('users.show', ['id'=> $comment->user->id])}}">Poster: {{$comment->user->profile->name ?? $comment->user->username}} </a></li>
            <li>{{$comment->comment_text}}</li>
            <li>Views: {{$comment->views}}</li>
        </ul>
    </div>

    <a href="{{route('comments.edit', ['id'=> $comment->id])}}">
        <button type="button">Edit comment</button>
    </a>

    <form method="POST" action="{{ route('comments.destroy', ['id'=> $comment->id])}}">
        @csrf
        @method('DELETE')
        <input type = "submit" value = "Delete Comment">
    </form>

@endsection