@extends('layouts.app')

@section('title', '- Comment')

@section('content')

    <div class="container-md mt-3">  
        <div class="list-group">
            <a class="list-group-item list-group-item-action text-center" href="{{route('users.show', ['id'=> $comment->user->id])}}"><strong>{{$comment->user->profile->name ?? $comment->user->username}}</strong></a>
            <li class="list-group-item">{{$comment->comment_text}}</li>
            <li class="list-group-item text-center">Views: {{$comment->views}}</li>
        </div>
    </div>

    <div class="container-md mt-3 text-center"> 
        <a href="{{route('comments.edit', ['id'=> $comment->id])}}">
            <button class="btn btn-primary mb-2" type="button">Edit comment</button>
        </a>

        <form method="POST" action="{{ route('comments.destroy', ['id'=> $comment->id])}}">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type = "submit" value = "Delete Comment">
        </form>
    </div>
@endsection