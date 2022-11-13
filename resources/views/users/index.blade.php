@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <p>There are many users who want to post!!</p>

    <ul>

        @foreach ($users as $user)
            <li>{{$user->username}}</li>
        @endforeach

    </ul>

@endsection