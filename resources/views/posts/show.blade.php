@extends('layouts.app')

@section('title', $post->title)

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

    <a href="{{route('posts.edit', ['id'=> $post->id])}}">
        <button type="button">Edit post</button>
    </a>

    <livewire:comment-form :post="$post">

@endsection