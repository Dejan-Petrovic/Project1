<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<h3>Edit Task</h3>
<br>
<form method="POST" action="/update/{{$task->id}}">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" placeholder="Title..." value="{{$task->title}}" class="form-control" />
    </div>
    <div>
    <br>
        <textarea class="form-control" name="description" placeholder="Description">{{$task->description}}</textarea>
    </div>
    <br>
    <div>
        <label>Due Date</label>
        <input type="date" name="due_date" value="{{$task->due_date}}">
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>
</body>
</html>
