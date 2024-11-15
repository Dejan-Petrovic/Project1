<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>


<h3>Create Task</h3>
<br>
<form action="/addtask" method="POST">
    @csrf

    <div>
        <label>Title</label>
        <input type="text" name="title" placeholder="Title..." class="form-control" />
    </div>
    <div>
        <br>
        <textarea class="form-control" name="description" placeholder="Description"></textarea>
    </div>
    <br>
    <div>
        <label>Due Date</label>
        <input type="date" name="due_date">
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
    </tr>
    </thead>
    <tbody>
    @if (count($task) > 0)
        @foreach ($task as $tasks)
            <tr>
                <th>{{ $tasks->id }}</th>
                <th>{{ $tasks->title }}</th>
                <th>{{ $tasks->description }}</th>
                <th>{{ $tasks->due_date }}</th>
                <th><a href="/edit/{{ $tasks->id }}" class="btn btn-primary">Edit</a>
                    <a href="/delete/{{ $tasks->id }}" class="btn btn-danger">Delete</a>
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

</body>
</html>
