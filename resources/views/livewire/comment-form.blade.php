<div class = "mt-5 mb-3" >

    <h3 class='display-6 text-center'>Add comment</h3>

    <div class = "container-md mt-3 text-center">
        <form wire:submit.prevent="save">
            <div class = "container-md mt-3 text-center">
                <label for="text">Comment (max 500 characters):</label>
                <textarea class="form-control" id='text' wire:model="comment.comment_text" ></textarea>
            </div>
            <div class = "container-md mt-3 text-center">
                <button class="btn btn-primary" type="submit">Post</button>
            </div>
        </form>
    </div>

    <h3 class='display-6 mt-3 text-center'>Latest Comments</h3>

    <div class= "text-center">
        <a href="{{route('comments.post_index', ['id'=> $post->id])}}">
            <button class="btn btn-primary" type="button">View All Comments</button>
        </a>
    </div>
    @foreach ($comments as $comment)
        <div class="container-md mt-3 text-start">  
            <div class="list-group">
                <a class="list-group-item list-group-item-action text-center" href="{{route('users.show', ['id'=> $comment->user->id])}}"><strong>{{$comment->user->profile->name ?? $comment->user->username}}</strong></a>
                <a class="list-group-item list-group-item-action" href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a>
                <li class="list-group-item text-center" >Views: {{$comment->views}}</li>
                <li class="list-group-item text-center" >{{$comment->created_at}}</li>
            </div>
        </div>
    @endforeach
</div>
