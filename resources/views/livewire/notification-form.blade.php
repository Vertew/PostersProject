<div>
    <h2>Notifications</h2>
        <ul>
            @foreach ($user->unreadNotifications as $notification)
                @if ($notification->type == "App\Notifications\PostLiked")
                    <li>[{{ $notification->created_at }}] {{$notification->data['username']}} liked your post: {{$notification->data['title']}}</li>
                @elseif ($notification->type == "App\Notifications\CommentReceived")
                    <li>[{{ $notification->created_at }}] {{$notification->data['username']}} commented on your post: {{$notification->data['title']}}</li>
                @endif
                <button wire:click="mark_read('{{$notification->id}}')">Mark as read</button>
            @endforeach
        </ul>
</div>
