@extends('layouts.app')

@section('title', '- '.'New Post')

@section('content')

    <div class = "text-center">
        <h2 class='display-5'>Compose a post</h2>
    </div>

    <div class = "container-md mt-3 text-center">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-md mb-3 mt-3">
                <label for="title" class="form-label">Title:</label>
                <input type = "text" class="form-control" name = "title" id="title" placeholder="Enter title..." value = "{{old('title')}}">
            </div>
            <div class="container-md mb-3 mt-3">
                <label for="text">Post:</label>
                <textarea class="form-control" rows="5" id='text' name = "post_text"></textarea>
            </div>
            <div class="container-md mb-3 mt-3">
                <label for="filebutton">Add Image:</label>
                <input type = "file" name = "image" id='filebutton' value ="{{old('post_image')}}">
            </div>
            <input class="btn btn-primary" type = "submit" value = "Post">

            <a class="btn btn-danger" href="{{route('posts.index')}}">Cancel</a>
        </form>
    </div>

@endsection