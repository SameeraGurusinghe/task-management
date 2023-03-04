<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $response = $next($request);
            $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
            return $response;
        });
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function index(Request $request)
    {
        $tasks = Task::query();
        $completed = null;
        $due_date = null;
        $overdue = null;
    
        if ($request->has('completed')) {
            $completed = ($request->input('completed') == 'true');
            $tasks = $tasks->where('completed', $completed);
        } else {
            $completed = null;
        }
    
        if ($request->has('due_date')) {
            $due_date = $request->input('due_date');
            $tasks = $tasks->where('due_date', $due_date);
        } else {
            $due_date = null;
        }

        if ($request->has('overdue')) {
            $overdue = ($request->input('overdue') == 'true');
            $tasks = $tasks->where('due_date', '<', Carbon::today());
        }
    
        $tasks = $tasks->get();
    
        return view('tasks.index', compact('tasks', 'completed', 'due_date', 'overdue'));
    }
     
    
    public function create()
    {
        return view('tasks.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);
    
        $validatedData['completed'] = false;
        $validatedData['user_id'] = Auth::id();
    
        $task = Task::create($validatedData);
    
        $user = $request->user();
    
        Mail::send('emails.task_created', compact('task', 'user'), function ($message) use ($user) {
            $message->to($user->email)->subject('New Task Created');
        });
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }
    
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);
    
        $validatedData['completed'] = $request->has('completed');
    
        $task->update($validatedData);
    
        if ($task->completed) {
            $user = $request->user();
    
            Mail::send('emails.task_completed', compact('task', 'user'), function ($message) use ($user) {
                $message->to($user->email)->subject('Task Completed');
            });
        }
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
    
    public function destroy(Task $task)
    {
        $task->delete();
    
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

}