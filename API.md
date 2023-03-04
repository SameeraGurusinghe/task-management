## API Documentation

This documentation outlines the REST API endpoints for the Task Manager application.

The base URL for all endpoints is: `http://localhost:8000/api/tasks`.

## List all the endpoints

- `GET /api/tasks`: Returns a list of all tasks. Optional query parameters include completed (boolean), overdue and due_date (date).

- `GET /api/tasks/{id}`: Returns a single task with the specified ID. Returns a 404 error if the task does not exist.

- `POST /api/tasks`: Creates a new task. Required parameters include title (string), while optional parameters include description (string), due_date (date), and completed (boolean).

- `PUT /api/tasks/{id}`: Updates an existing task with the specified ID. Required parameters include title (string), while optional parameters include description (string), due_date (date), and completed (boolean).

- `DELETE /api/tasks/{id}`: Deletes an existing task with the specified ID. Returns a 404 error if the task does not exist.