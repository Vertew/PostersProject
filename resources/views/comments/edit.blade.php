@extends('layouts.app')

@section('title', 'Editing...')

@section('content')

    <form method="POST" action="{{ route('comments.update' , ['id'=> $comment->id])}}" enctype="multipart/form-data">
        @csrf
        <textarea rows="5" cols="33" name="comment_text" >{{$comment->comment_text}}</textarea>
        <input type = "submit" value = "Post">
        <a href="{{route('comments.show',['id'=> $comment->id])}}">Cancel</a>
    </form>

@endsection