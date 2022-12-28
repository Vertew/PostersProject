<link rel="stylesheet" href="{{asset('/css/app.css')}}">

<div>
    <button wire:click="mark_all_read">Mark all as read</button>
        <ul>
            @forelse ($user->unreadNotifications as $notification)
                @if ($notification->type == "App\Notifications\PostLiked")
                    <li>[{{ $notification->created_at }}] 
                        <a href="{{route('users.show', ['id'=> $notification->data['user_id']])}}">{{$notification->data['username']}}</a> liked your post: 
                        <a href = "{{route('posts.show', ['id'=>$notification->data['post_id']])}}">{{$notification->data['title']}}</a>
                    </li>
                @elseif ($notification->type == "App\Notifications\CommentReceived")
                    <li>[{{ $notification->created_at }}] 
                        <a href="{{route('users.show', ['id'=> $notification->data['user_id']])}}">{{$notification->data['username']}}</a> commented on your post: 
                        <a href = "{{route('posts.show', ['id'=>$notification->data['post_id']])}}">{{$notification->data['title']}}</a>
                    </li>
                @elseif ($notification->type == "App\Notifications\CommentViewed")
                    <li>[{{ $notification->created_at }}] 
                        <a href="{{route('users.show', ['id'=> $notification->data['user_id']])}}">{{$notification->data['username']}}</a> saw your comment!: 
                        <a href = "{{route('comments.show', ['id'=>$notification->data['comment_id']])}}">{{$notification->data['comment_text']}}</a>
                    </li>
                @endif
                <button wire:click="mark_read('{{$notification->id}}')">Mark as read</button>
            @empty
                No new notifications at the moment.
            @endforelse
        </ul>
</div>
