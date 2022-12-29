@extends('layouts.app')

@section('title')

@section('content')

        <div class = "text-center">
            @if(request()->route()->uri == 'posts')
                <h2 class='display-3'>Home</h2>
                <a href="{{route('posts.create')}}">
                    <button class="btn btn-primary" type="button">Make a new post</button>
                </a>
            @else
                <h2 class='display-3'>{{$user->username}}'s Posts</h2>
            @endif

        </div>
  
        @foreach ($posts as $post)
            <div class="container-md mt-3">  
                <div class="list-group">
                    @if(request()->route()->uri == 'posts')
                        <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $post->user->id])}}"><strong>{{$post->user->profile->name ?? $post->user->username}}</strong></a>
                    @endif
                    <a class="list-group-item list-group-item-action" style='text-align: left' href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a>
                    <li class="list-group-item"><livewire:like-form :post="$post"></li>
                    <li class="list-group-item">{{$post->views}} Views</li>
                    <li class="list-group-item">{{$post->created_at}}</li>
                </div>
            </div>
        @endforeach

    <div class = "container-md mb-3 mt-3">
        {{ $posts->links() }}
    </div>

@endsection