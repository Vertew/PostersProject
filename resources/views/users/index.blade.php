@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <p>There are many users who want to post!!</p>

    <ul>

        @foreach ($users as $user)
            <li><a href = "{{route('users.show', ['id'=> $user->id])}}"> {{$user->username}}</a></li>
        @endforeach

    </ul>

@endsection