<div>

    <h3>Add comment</h3>

    <form wire:submit.prevent="save">
        <p>Max 500 characters</p>
        <textarea wire:model="comment.comment_text" ></textarea>
     
        <button type="submit">Post</button>
    </form>

    <h2>Comments</h2>

    @foreach ($comments as $comment)
        <li>Poster: <a style="color:rgb(0, 0, 0);" href="{{route('users.show', ['id'=> $comment->user->id])}}">{{$comment->user->profile->name ?? $comment->user->username}} </a></li>
        <li><a href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a></li>
        <li>Views: {{$comment->views}}</li>
        <p> </p>
    @endforeach
    

</div>
