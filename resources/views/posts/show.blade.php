@extends('layouts.app')

@section('title', 'Post')

@section('content')

    <ul>

        <li>Poster: {{$post->user->profile->name ?? 'Anonymous'}}</li>

        <li>{{$post->post_text}}</li>

        @if ($post->image != null)
            <li> <img src={{ asset('images/'.$post->image) }}> </li>
        @endif

        <li>Views: {{$post->views}}</li>

    </ul>

@endsection