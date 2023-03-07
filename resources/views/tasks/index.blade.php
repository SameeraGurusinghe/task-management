@extends('layouts.app')

@section('title', 'Manage Your Tasks')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Tasks') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('tasks.index') }}">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Filter by completion') }}</label>

                                <!-- When user selects a new option, as soon as the form will be submitted to the server and retrive data.  -->
                                <div class="col-md-6">
                                    <select id="completed" name="completed" class="form-control" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="true"{{ $completed === true ? ' selected' : '' }}>Completed tasks</option>
                                        <option value="false"{{ $completed === false ? ' selected' : '' }}>Incomplete tasks</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <form method="GET" action="{{ route('tasks.index') }}">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Filter by overdue') }}</label>

                                <div class="col-md-6">
                                    <select id="overdue" name="overdue" class="form-control" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="true"{{ $overdue === true ? ' selected' : '' }}>Overdue tasks</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <form method="GET" action="{{ route('tasks.index') }}">
                            <div class="form-group row">
                                <label for="due_date" class="col-md-4 col-form-label text-md-right">{{ __('Filter by Due date') }}</label>

                                <div class="col-md-6">
                                    <input id="due_date" type="date" class="form-control @error('due_date') is-invalid @enderror" name="due_date" value="{{ old('due_date', $due_date) }}" onchange="this.form.submit()">

                                    @error('due_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>

                        <!-- If there no any data to selected filter, following messages will display. -->
                        @if ($tasks->count() == 0 && $completed === null && $due_date === null)
                            <p>No tasks found.</p>
                        @elseif ($tasks->count() == 0 && ($completed !== null || $due_date !== null))
                            <p>No tasks found for selected filter.</p>
                        @else
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">{{ __('Title') }}</th>
                                        <th style="width: 35%">{{ __('Description') }}</th>
                                        <th style="width: 15%">{{ __('Due Date') }}</th>
                                        <th style="width: 10%">{{ __('Completed') }}</th>
                                        <th style="width: 25%">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>{{ date('Y-m-d', strtotime($task->due_date)) }}</td>
                                            <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                                            <td>
                                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection