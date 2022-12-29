@extends('layouts.app')

@section('title', '- '.$user->username)

@section('content')

    <h3 class='display-6 text-center'>All notifications</h3>
    @forelse ($unreadNotifications as $notification)
    <div class="container-md mt-3">  
        <div class="list-group">
            @if ($notification->type == "App\Notifications\PostLiked")
                <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $notification->data['user_id']])}}"><strong>{{$notification->data['username']}}</strong> liked your post:</a>
                <a class="list-group-item list-group-item-action" href = "{{route('posts.show', ['id'=>$notification->data['post_id']])}}">{{$notification->data['title']}}</a>
                <li class="list-group-item">{{ $notification->created_at }}</li>
            @elseif ($notification->type == "App\Notifications\CommentReceived")
                <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $notification->data['user_id']])}}"><strong>{{$notification->data['username']}}</strong> commented on your post:</a>
                <a class="list-group-item list-group-item-action" href = "{{route('posts.show', ['id'=>$notification->data['post_id']])}}">{{$notification->data['title']}}</a>
                <li class="list-group-item">{{ $notification->created_at }}</li>
            @elseif ($notification->type == "App\Notifications\CommentViewed")      
                <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $notification->data['user_id']])}}"><strong>{{$notification->data['username']}}</strong> saw your comment!</a> 
                <a class="list-group-item list-group-item-action" href = "{{route('comments.show', ['id'=>$notification->data['comment_id']])}}">{{$notification->data['comment_text']}}</a>
                <li class="list-group-item">{{ $notification->created_at }}</li>
            @endif
        </div>
    </div>
    @empty
        <p>No new notifications at the moment.</p>
    @endforelse

    <div class = "container-md mb-3 mt-3">
        {{ $unreadNotifications->links() }}
    </div>

@endsection