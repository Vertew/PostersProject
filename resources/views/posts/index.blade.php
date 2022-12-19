@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <p>Check out the latest posts!!</p>

    <a href="{{route('posts.create')}}">Compose post</a>

    <ul>

        @foreach ($posts as $post)
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
        @endforeach

    </ul>


@endsection