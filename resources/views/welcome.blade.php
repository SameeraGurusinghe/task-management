@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome, & Manage Your Tasks!</h1>
            <hr class="my-4">
            <p>Login or registering for an account to manage your tasks</p>
            <p class="lead">
                <a class="btn btn-primary btn" href="{{ route('login') }}">Login</a>
                <a class="btn btn-secondary btn" href="{{ route('register') }}">Register</a>
            </p>
        </div>
    </div>
@endsection