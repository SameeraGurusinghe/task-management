@extends('layouts.app')

@section('title', 'You are Logged in')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status')) && (auth()->check())
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <hr />
                    <div class="p-3 text-center">
                        View
                        <a class="btn btn-success" href="{{ route('tasks.index') }}">All Tasks</a>
                        or
                        <a class="btn btn-success" href="{{ route('tasks.create') }}">Create New Task</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
