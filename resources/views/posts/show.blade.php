@extends('layouts.app')

@section('title', 'Post')

@section('content')

    <ul>

        <li>Poster: {{$post->user->profile->name ?? 'Anonymous'}}</li>

        <li>{{$post->post_text}}</li>

        <li> <img src={{$post->image}}> </li>

        <li>Views: {{$post->views}}</li>

    </ul>

@endsection