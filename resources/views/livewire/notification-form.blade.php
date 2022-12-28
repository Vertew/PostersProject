<div id = 'main'>
    <button wire:click="mark_all_read">Mark all as read</button>
        <ul>
            @forelse ($user->unreadNotifications as $notification)
                <li style = 'text-align: center'><button  wire:click="mark_read('{{$notification->id}}')">Mark as read</button></li>
                @if ($notification->type == "App\Notifications\PostLiked")
                    <li style = 'text-align: center'>
                        <a href="{{route('users.show', ['id'=> $notification->data['user_id']])}}">{{$notification->data['username']}} liked your post: </a>
                        <a href = "{{route('posts.show', ['id'=>$notification->data['post_id']])}}">{{$notification->data['title']}}</a>
                        {{ $notification->created_at }}
                    </li>
                @elseif ($notification->type == "App\Notifications\CommentReceived")
                    <li style = 'text-align: center'>
                        <a href="{{route('users.show', ['id'=> $notification->data['user_id']])}}">{{$notification->data['username']}} commented on your post:</a>
                        <a href = "{{route('posts.show', ['id'=>$notification->data['post_id']])}}">{{$notification->data['title']}}</a>
                        {{ $notification->created_at }}
                    </li>
                @elseif ($notification->type == "App\Notifications\CommentViewed")
                    <li style = 'text-align: center'>
                        <a href="{{route('users.show', ['id'=> $notification->data['user_id']])}}">{{$notification->data['username']}} saw your comment! </a> 
                        <a href = "{{route('comments.show', ['id'=>$notification->data['comment_id']])}}">{{$notification->data['comment_text']}}</a>
                        {{ $notification->created_at }}
                    </li>
                @endif
            @empty
                No new notifications at the moment.
            @endforelse
        </ul>
</div>
