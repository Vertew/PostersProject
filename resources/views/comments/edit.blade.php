@extends('layouts.app')

@section('title', '- Editing...')

@section('content')

    <div class = "container-md mt-3 text-center">
        <form method="POST" action="{{ route('comments.update' , ['id'=> $comment->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="container-md mb-3 mt-3">
                <label for="text">Comment:</label>
                <textarea class="form-control" rows="5" cols="33" id='text' name="comment_text" >{{$comment->comment_text}}</textarea>
            </div>
            <div class="container-md mb-3 mt-3">
                <input class="btn btn-primary" type = "submit" value = "Post">
            </div>
            <a class="btn btn-secondary" href="{{route('comments.show',['id'=> $comment->id])}}">Cancel</a>
        </form>
    </div>

@endsection