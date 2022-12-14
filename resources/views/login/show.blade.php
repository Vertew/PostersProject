@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <p>Enter login details</p>

    <form method="POST" action="{{ route('login.authenticate') }}">
        @csrf
        <p>Email: <input type = "text" name = "email" value ="{{old('email')}}"></p>
        <p>Password: <input type = "text" name = "password" value ="{{old('password')}}"></p>
        <input type = "submit" value = "Submit">
    </form>

@endsection