@extends('layouts.app')

@section('title', 'Post')

@section('content')

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <ul>

        <li><a href="{{route('users.show', ['id'=> $post->user->id])}}">Poster: {{$post->user->profile->name ?? $post->user->username}} </a></li>

        <li>{{$post->post_text}}</li>

        @if ($post->image != null)
            <li> <img src={{ asset('images/'.$post->image) }}> </li>
        @endif

        <li>Views: {{$post->views}}</li>

    </ul>

    <h2>Comments</h2>

    <ul>

        @foreach ($post->comments as $comment)
            <li>{{$comment->user->profile->name ?? $comment->user->username}}:</li>
            <li><a href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a></li>
        @endforeach

    </ul>

@endsection