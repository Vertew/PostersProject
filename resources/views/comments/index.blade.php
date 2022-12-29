@extends('layouts.app')

@section('title')

@section('content')

        <div class = "text-center">
            @if(request()->route()->uri == 'comments/index/user/{id}')
                <h2 class='display-3'>{{$user->username}}'s Comments</h2>
            @elseif(request()->route()->uri == 'comments/index/post/{id}')
                <h2 class='display-3'>Comments for {{$post->title}}</h2>
            @endif
        </div>
  
        @foreach ($comments as $comment)
            <div class="container-md mt-3">  
                <div class="list-group">
                    @if(request()->route()->uri == 'comments/index/post/{id}')
                        <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $comment->user->id])}}"><strong>{{$comment->user->profile->name ?? $comment->user->username}}</strong></a>
                    @endif
                    <a class="list-group-item list-group-item-action" href = "{{route('comments.show', ['id'=> $comment->id])}}"> {{$comment->comment_text}}</a>
                    <li class="list-group-item">{{$comment->views}} Views</li>
                    <li class="list-group-item">{{$comment->created_at}}</li>
                </div>
            </div>
        @endforeach

    <div class = "container-md mb-3 mt-3">
        {{ $comments->links() }}
    </div>

@endsection