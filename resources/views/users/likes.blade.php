@extends('layouts.app')

@section('title', '- '.$user->username)

@section('content')

    <div class="container-md mt-3 text-center">  
        <h3 class='display-6'>Posts liked by {{$user->username}}</h3>
    </div>
    
    @forelse ($posts as $post)
        <div class="container-md mt-3">  
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $post->user->id])}}"><strong>{{$post->user->profile->name ?? $post->user->username}}</strong></a>
                <a class="list-group-item list-group-item-action" style='text-align: left' href = "{{route('posts.show', ['id'=> $post->id])}}"> {{$post->post_text}}</a>
                <li class="list-group-item"><livewire:like-form :post="$post"></li>
                <li class="list-group-item">{{$post->views}} Views</li>
                <li class="list-group-item">{{$post->created_at}}</li>
            </div>
        </div>
    @empty
        <p class = "text-center">No likes, for now.</p>
    @endforelse

    <div class = "container-md mb-3 mt-3">
        {{ $posts->links() }}
    </div>

@endsection
