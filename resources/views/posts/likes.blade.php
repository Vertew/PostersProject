@extends('layouts.app')

@section('title', '- '.$post->title)

@section('content')

    <div class="container-md mt-3 text-center">  
        <h3 class='display-6'>Users who liked this post</h3>
    </div>
    
    <div class="container-md mt-3 text-center">  
        <div class="list-group">
            @foreach ($users as $user)
                <a class="list-group-item list-group-item-action" href="{{route('users.show', ['id'=> $user->id])}}">{{$user->profile->name ?? $user->username}} </a>
            @endforeach
        </div>
    </div>

@endsection