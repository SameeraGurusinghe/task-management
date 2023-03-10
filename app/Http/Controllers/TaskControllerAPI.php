<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskControllerAPI extends Controller
{
    // Returns a JSON response containing all tasks filtered by completed, due date or overdue query parameters.
    public function index(Request $request)
    {
        $tasks = Task::all();

        if ($request->has('completed')) {
            $completed = ($request->input('completed') == 'true');
            $tasks = $tasks->where('completed', $completed);
        }

        if ($request->has('due_date')) {
            $due_date = $request->input('due_date');
            $tasks = $tasks->where('due_date', $due_date);
        }

        if ($request->has('overdue')) {
            $overdue = ($request->input('overdue') == 'true');
            $tasks = $tasks->where('due_date', '<', Carbon::today());
        }

        return response()->json([
            'data' => $tasks
        ]);
    }

    // Returns a JSON response containing the task with the specified ID
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'error' => 'Task not found'
            ], 404);
        }

        return response()->json([
            'data' => $task
        ]);
    }

    // Creates a new task based on the request data and returns a JSON response with the created task
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'completed' => 'nullable|boolean'
        ]);

        $task = Task::create($validatedData);

        return response()->json([
            'data' => $task
        ], 201);
    }

    // Updates the task with the specified ID with the request data and returns a JSON response with the updated task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'error' => 'Task not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
            'completed' => 'nullable|boolean'
        ]);

        $task->update($validatedData);

        return response()->json([
            'data' => $task
        ]);
    }

    // Deletes the task with the specified ID
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'error' => 'Task not found'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'data' => null
        ], 204);
    }
}