<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit-Category</title>
</head>
<body>

<h3>Edit Category</h3>
<br>
<form method="POST" action="/update/{{$category->id}}">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" placeholder="Name..." value="{{$category->name}}" class="form-control" />
    </div>
    <div>
        <br>
        <textarea class="form-control" name="description" placeholder="Description">{{$category->description}}</textarea>
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
</body>
</html>
