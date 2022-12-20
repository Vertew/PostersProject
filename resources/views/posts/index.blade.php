@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <a href="{{route('users.show', ['id'=> $user->id])}}">
        <button type="button">My Account</button>
    </a>

    <h2>Check out the latest posts!!</h2>

    <a href="{{route('posts.create')}}">
        <button type="button">Compose post</button>
    </a>

    <ul>

        @foreach ($posts as $post)
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
        @endforeach

    </ul>


@endsection