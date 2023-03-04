<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>body {background-color: #ABB2B9;}</style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">MyTasksManager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        @if(auth()->check())
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::path() == 'tasks' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('tasks.index') }}">All Tasks</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'tasks/create' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('tasks.create') }}">Create New Task</a>
                    </li>
                </ul>
            </div>
        @endif

        @if(auth()->check())
            <a class="btn btn-danger btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif

    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>