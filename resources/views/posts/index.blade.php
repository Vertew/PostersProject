@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <a href="{{route('users.show', ['id'=> Auth::id()])}}">
        <button type="button">My Account</button>
    </a>

    <h2>Check out the latest posts!!</h2>

    <a href="{{route('posts.create')}}">
        <button type="button">Compose post</button>
    </a>

    <ul>

        @foreach ($posts as $post)
            <li>Poster: <a style="color:rgb(0, 0, 0);" href="{{route('users.show', ['id'=> $post->user->id])}}">{{$post->user->profile->name ?? $post->user->username}} </a></li>
            <li><a href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
            <li>{{$post->views}} Views <livewire:like-form :post="$post"></li>
            <p> </p>
        @endforeach

    </ul>


@endsection