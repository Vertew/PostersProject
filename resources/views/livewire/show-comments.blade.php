<div>

    <h2>Comments</h2>
    
    @foreach ($comments as $comment)
        <li>{{$comment->user->profile->name ?? $comment->user->username}}:</li>
        <li><a href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a></li>
    @endforeach
</div>
