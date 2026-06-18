<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Management</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="app-layout">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                Task Management System
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">

            <div class="card">
                @if (isset($task))
                    <div class="card-header">
                        Update Task
                    </div>
                    <div class="card-body">
                        <form action="/tasks/update" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">

                            <div class="mb-3">
                                <label class="form-label">Task Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $task->name }}"
                                    required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-info">
                                    Update Task
                                </button>
                                <a href="/tasks" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="card-header">
                        New Task
                    </div>
                    <div class="card-body">
                        <form action="/store" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Task Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success">
                                    Add Task
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    Current Registered Tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th style="text-align:center; width:250px;">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>

                                    <td style="text-align:center;">

                                        <form action="/tasks/edit/{{ $task->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Edit
                                            </button>
                                        </form>
                                        <form action="/tasks/delete/{{ $task->id }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
