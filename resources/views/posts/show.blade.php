@extends('layouts.app')

@section('title', 'Post')

@section('content')

    <a href="{{url()->previous()}}">
        <button type="button">Back</button>
    </a>

    <ul>

        <li><a href="{{route('users.show', ['id'=> $post->user->id])}}">Poster: {{$post->user->profile->name ?? 'Anonymous'}} </a></li>

        <li>{{$post->post_text}}</li>

        @if ($post->image != null)
            <li> <img src={{ asset('images/'.$post->image) }}> </li>
        @endif

        <li>Views: {{$post->views}}</li>

    </ul>

    <a href="{{route('posts.index')}}">
        <button type="button">Return</button>
    </a>

@endsection