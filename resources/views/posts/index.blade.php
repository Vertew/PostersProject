@extends('layouts.app')

@section('title')

@section('content')

        <div class = "text-center">
            <h2 class='display-3'>Home</h2>

            <a href="{{route('posts.create')}}">
                <button class="btn btn-primary" type="button">Make a new post</button>
            </a>
        </div>
  
        @foreach ($posts as $post)
        <div class="container-md mt-3">  
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $post->user->id])}}"><strong>{{$post->user->profile->name ?? $post->user->username}}</strong></a>
                <a class="list-group-item list-group-item-action" style='text-align: left' href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a>
                <li class="list-group-item"><livewire:like-form :post="$post"></li>
                <li class="list-group-item">{{$post->views}} Views</li>
                <li class="list-group-item">{{$post->created_at}}</li>
            </div>
        </div>
        @endforeach
    {{ $posts->links() }}

@endsection