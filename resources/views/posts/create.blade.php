@extends('layouts.app')

@section('title', 'New Post')

@section('content')

    <h2>Compose a post</h2>

    <div id = 'main'>
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <h3>Title: <input type = "text" name = "title" value = "{{old('title')}}" placeholder="Title here..."></h3>
            <textarea rows="5" cols="33" name = "post_text" placeholder="Get writing..."> </textarea>
            <p>Add image: <input type = "file" name = "image" value ="{{old('post_image')}}"></p>
            <input type = "submit" value = "Post">
            <a href="{{route('posts.index')}}">Cancel</a>
        </form>
    </div>

@endsection