@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <p>Create User</p>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <p>Username: <input type = "text" name = "username" value ="{{old('username')}}"></p>
        <p>Email: <input type = "text" name = "email" value ="{{old('email')}}"></p>
        <p>Password: <input type = "password" name = "password" value ="{{old('password')}}"></p>
        <input type = "submit" value = "Submit">
        <a href="{{route('users.index')}}">Cancel</a>
    </form>

@endsection