@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h3>Users who liked this post</h3>
    
    <div id = 'main'>
        @foreach ($users as $user)
        <ul>
            <li><a href="{{route('users.show', ['id'=> $user->id])}}">{{$user->profile->name ?? $user->username}} </a></li>
        </ul>
        @endforeach
    </div>

@endsection