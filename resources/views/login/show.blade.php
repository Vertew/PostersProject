@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <h3>Enter login details</h3>

    <div>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <p>Email: <input type = "text" name = "email" value ="{{old('email')}}"></p>
            <p>Password: <input type = "password" name = "password" value ="{{old('password')}}"></p>
            <input type = "submit" value = "Login">
        </form>

        <a href="{{route('users.create')}}">Don't have an account? Click here to register.</a>

    </div>

@endsection