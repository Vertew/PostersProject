@extends('layouts.app')

@section('title', 'User Info')

@section('content')

    <ul>


        <li>Username: {{$user->username}}</li>

        <li>Email: {{$user->email}}</li>

        <li>Name: {{$user->profile->name ?? 'Anonymous'}}</li>

    </ul>

@endsection