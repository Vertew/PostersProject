@push('styles')
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
@endpush

<div>

    <h3>Add comment</h3>

    <form wire:submit.prevent="save">
        <p>Max 500 characters</p>
        <textarea wire:model="comment.comment_text" ></textarea>
     
        <button type="submit">Post</button>
    </form>

    <h2>Comments</h2>

    <ul>
        @foreach ($comments as $comment)
            <li><a href="{{route('users.show', ['id'=> $comment->user->id])}}">{{$comment->user->profile->name ?? $comment->user->username}} </a></li>
            <li><a style = 'text-align = left' href = "{{route('comments.show', ['id'=> $comment->id])}}">{{$comment->comment_text}}</a></li>
            <li>Views: {{$comment->views}}</li>
        @endforeach
    </ul>
    
</div>
