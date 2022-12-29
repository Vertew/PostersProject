@extends('layouts.app')

@section('title')

@section('content')

        <div class = "text-center">
            <h2 class='display-3'>{{$user->username}}'s Comments</h2>
        </div>
  
        @foreach ($comments as $comment)
            <div class="container-md mt-3">  
                <div class="list-group">
                    <!--<a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $user->id])}}"><strong>{{$user->profile->name ?? $user->username}}</strong></a>-->
                    <a class="list-group-item list-group-item-action" style='text-align: left' href = "{{route('comments.show', ['id'=> $comment->id])}}"> {{$comment->comment_text}}</a>
                    <li class="list-group-item">{{$comment->views}} Views</li>
                    <li class="list-group-item">{{$comment->created_at}}</li>
                </div>
            </div>
        @endforeach

    <div class = "container-md mb-3 mt-3">
        {{ $comments->links() }}
    </div>

@endsection