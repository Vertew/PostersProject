@extends('layouts.app')

@section('title', 'Editing...')

@section('content')

    <form method="POST" action="{{ route('posts.update' , ['id'=> $post->id])}}" enctype="multipart/form-data">
        @csrf
        <p>Title: <input type = "text" name = "title" value = "{{$post->title}}"></p>
        <textarea rows="5" cols="33" name = "post_text">{{$post->post_text}}</textarea>
        <p>Add/change image: <input type = "file" name = "image"></p>
        <input type="checkbox" id="checkbox1" name = "checkbox">
        <label for="checkbox1">Remove image</label><br>
        <input type = "submit" value = "Post">
        <a href="{{route('posts.show',['id'=> $post->id])}}">Cancel</a>
    </form>


@endsection