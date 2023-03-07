<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

// A default route that simply displays a welcome view to user.
Route::get('/', function () {
    return view('welcome');
});

// A resource route for managing tasks.
// This helps to easily define all of the routes necessary for managing tasks (Show, Create, Edit, Update, Delete)
Route::resource('tasks', TaskController::class);

// routes for filtering tasks by completion status and due date.
Route::get('/tasks/completed', [TaskController::class, 'completed'])->name('tasks.completed');
Route::get('/tasks/incomplete', [TaskController::class, 'incomplete'])->name('tasks.incomplete');
Route::get('/tasks/overdue', [TaskController::class, 'overdue'])->name('tasks.overdue');

// Authentication routes provided by Laravel's Auth module.
Auth::routes();

// A route that displays the home page when a user is logged in.
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');