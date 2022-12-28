@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h3>Users who liked this post</h3>
    
    <div>
        <ul>
            @foreach ($users as $user)
                <li><a style="color:rgb(0, 0, 0);" href="{{route('users.show', ['id'=> $user->id])}}">{{$user->profile->name ?? $user->username}} </a></li>
            @endforeach
        </ul>
    </div>

@endsection