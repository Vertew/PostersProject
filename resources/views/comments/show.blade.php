@extends('layouts.app')

@section('title', 'Comment')

@section('content')

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <ul>

        <li><a href="{{route('users.show', ['id'=> $comment->user->id])}}">Poster: {{$comment->user->profile->name ?? $comment->user->username}} </a></li>

        <li>{{$comment->comment_text}}</li>

        <li>Views: {{$comment->views}}</li>

    </ul>

    <a href="{{route('posts.index')}}">
        <button type="button">Return</button>
    </a>

@endsection