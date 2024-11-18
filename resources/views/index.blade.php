<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

@if(session('success'))
    <p>{{(session('success'))}}</p>
@endif

<h3>Create Task</h3>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    @guest
        <a href="/login" class="btn btn-primary">LOGIN</button></a>
        <a href="/register" class="btn btn-primary">REGISTER</button></a>
    @endguest

        @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-primary">LOG OUT</button></a>
            </form>
        @endauth
</div>
<br>
<form action="/addtask" method="POST">
    @csrf

    <div>
        <label>Title</label>
        <input type="text" name="title" placeholder="Title..." class="form-control" required/>
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div>
        <br>
        <textarea class="form-control" name="description" placeholder="Description" required></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <div>
        <label>Due Date</label>
        <input type="date" name="due_date"><br>
        @error('due_date') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary">CREATE</button>
    </div>
</form>
<br>
<h3>Tasks List</h3>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Due date</th>
        <th scope="col">Complete Status</th>
    </tr>
    </thead>
    <tbody>
    @if (count($tasks) > 0)

        <p>Total number of tasks: {{$tasks->total()}}</p>

        @foreach ($tasks as $task)
            <tr>
                <th>{{ $task->id }}</th>
                <th>{{ $task->title }}</th>
                <th>{{ $task->description }}</th>
                <th>{{ $task->due_date }}</th>
                <th>{{ $task->completed_status }}</th>
                <th><a href="/edit/{{ $task->id }}" class="btn btn-primary">Edit</a>
                    <a href="/delete/{{ $task->id }}" class="btn btn-danger">Delete</a>
                </th>
            </tr>
        @endforeach
    @else
        <tr>
            <th>No Data</th>
        </tr>
    @endif
    </tbody>
</table>
</div>

<div>
{{$tasks->links()}}
</div>

</body>
</html>
