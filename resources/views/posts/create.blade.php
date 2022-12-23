@extends('layouts.app')

@section('title', 'New Post')

@section('content')

    <p>Compose a post</p>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <p>Max 20 characters</p>
        <p>Title: <input type = "text" name = "title" value = "{{old('title')}}"></p>
        <p>Max 1000 characters</p>
        <textarea rows="5" cols="33" name = "post_text"></textarea>
        <p>Add image: <input type = "file" name = "image" value ="{{old('post_image')}}"></p>
        <input type = "submit" value = "Post">
        <a href="{{route('posts.index')}}">Cancel</a>
    </form>

@endsection