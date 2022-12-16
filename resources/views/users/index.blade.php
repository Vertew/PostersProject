@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <p>There are many users who want to post!!</p>

    <form method="POST" action="{{ route('login.logout') }}">
        @csrf
        <input type = "submit" value = "Logout">
    </form>

    <ul>

        @foreach ($users as $user)
            <li><a href = "{{route('users.show', ['id'=> $user->id])}}"> {{$user->username}}</a></li>
        @endforeach

    </ul>

    <a href="{{route('users.create' )}}">Create New User</a>

@endsection