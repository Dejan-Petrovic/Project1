<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category</title>
</head>
<body>
<div class="topnav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Create Categories</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Tasks <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category">Categories (current)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user">Users</a>
                </li>
            </ul>
        </div>
        <div>
            @guest
                <a href="/login" class="btn btn-success ">LOGIN</button></a>
                <a href="/register" class="btn btn-success">REGISTER</button></a>
            @endguest

            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-danger">LOG OUT</button></a>
                </form>
            @endauth
        </div>
    </nav>
</div>

@if(session('success'))
    <p>{{(session('success'))}}</p>
@endif
<div class="card container mt-5">
    <h3>Create Categories</h3>
    <br>
    <form action="/add" method="POST">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" required/>
            @error('title') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <br>
        <div>
            <textarea class="form-control" name="description" placeholder="Description" required></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <br>
        <div>
            <label for="task">Select Task:</label>
            <select name="task_id" id="task" required>
                <option value="" disabled selected>-- Select a Task --</option>
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->title }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary">CREATE</button>
        </div>
    </form>
</div>
<div class="card container mt-5" >
    <h3>Filter Categories by name</h3>

    <form action="{{ route('category') }}" method="GET">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Write name</label>
            <input type="text" name="filter[name]" id="name" placeholder="Type name" value="{{ request('name') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('category') }}" class="btn btn-secondary">Clear Filter</a>
    </form>
</div>
<div class="card container mt-5" >
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Task</th>
    </tr>
    </thead>
    <tbody>
    @if (count($categories) > 0)

        <p>Total number of tasks: {{$categories->total()}}</p>

        <div class="sorting mb-3">
            <a href="{{ route('index', array_merge(request()->query(), ['sort' => 'asc'])) }}"
               class="btn btn-link">Sort by Alphabetical order</a>
        </div>

        @foreach ($categories as $category)
            <tr>
                <th>{{ $category->id }}</th>
                <th>{{ $category->name }}</th>
                <th>{{ $category->description }}</th>
                <th>{{ $category->tasks->first()->name ?? 'No Category' }}</th>
                <th><a href="/edit-category/{{ $category->id }}" class="btn btn-primary">Edit</a>
                    <a href="/delete/{{ $category->id }}" class="btn btn-danger">Delete</a>
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
</div>
<div class="container mt-5" >
    {{$categories->links()}}
</div>

</body>
</html>
