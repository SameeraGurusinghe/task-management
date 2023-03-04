<p>Hello {{ $user->name }},</p>

<p>A new task has been created:</p>

<p>Title: {{ $task->title }}</p>
<p>Description: {{ $task->description }}</p>
<p>Due Date: {{ $task->due_date->format('F j, Y') }}</p>

<p>Regards,<br>
MyTasksManager</p>