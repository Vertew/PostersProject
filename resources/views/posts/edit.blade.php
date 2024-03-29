@extends('layouts.app')

@section('title', '- Editing...')

@section('content')

    <div class = "text-center">
        <h2 class='display-5'>Edit your post</h2>
    </div>

    <div class = "container-md mb-3 mt-3 text-center">
        <form method="POST" action="{{ route('posts.update' , ['id'=> $post->id])}}" enctype="multipart/form-data">
            @csrf
            <p>Both title and post cannot be empty</p>
            <div class="container-md mb-3 mt-3">
                <label for="title">Title:</label>
                <input class="form-control" type = "text" name = "title" id='title' value = "{{$post->title}}">
            </div>
            <div class="container-md mb-3 mt-3">
                <label for="text">Post:</label>
                <textarea class="form-control" rows="5" cols="33" name = "post_text" id='text'>{{$post->post_text}}</textarea>
            </div>
            <div class="container-md mb-3 mt-3">
                <label for="filebutton">Add Image:</label>
                <input class="form-control" type = "file" name = "image" id='filebutton'>
            </div>
            <div class="container-md mb-3 mt-3">
                <label for="checkbox1">Check to remove current image: </label>
                <input type="checkbox" id="checkbox1" name = "checkbox">
            </div>
            <div class="container-md mb-3 mt-3">
                <input class="btn btn-primary" type = "submit" value = "Post">
                <a class="btn btn-secondary" href="{{route('posts.show',['id'=> $post->id])}}">Cancel</a>
            </div>
        </form>
    </div>

@endsection