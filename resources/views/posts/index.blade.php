@extends('layouts.app')

@section('title')

@section('content')

    <h2>Home</h2>

    <a href="{{route('posts.create')}}">
        <button type="button">Make a new post</button>
    </a>

    <div>
        @foreach ($posts as $post)
            <ul>
                <li><a href="{{route('users.show', ['id'=> $post->user->id])}}">{{$post->user->profile->name ?? $post->user->username}} </a></li>
                <li><a style='text-align: left' href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a></li>
                <li><livewire:like-form :post="$post"></li>
                <li>{{$post->views}} Views</li>
                <li>{{$post->created_at}}</li>
            </ul>
        @endforeach
    </div>

    {{ $posts->links() }}

@endsection