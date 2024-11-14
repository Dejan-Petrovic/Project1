<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<div>
@if (session('status'))
    <div class="alert alert-success"> {{session('status')}}
    </div>
@endif
</div>

<h3>Create Task</h3>
<br>
<form action="{{url('tasks/create')}}" method="POST">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" placeholder="Title..." class="form-control" value="{{old('name')}}" />
    </div>
    <br>
        <textarea class="form-control" name="description" placeholder="Description">{{old('description')}}</textarea>
    </div>
    <br>
    <div>
        <label>Due Date</label>
        <input type="date" name="due_date">
    </div>
    <br>
    <div>
        <a href="{{url('tasks')}}" class="btn btn-primary">SAVE</a>
    </div>

</form>
</body>
</html>
