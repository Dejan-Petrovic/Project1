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
    <a class="navbar-brand">Create Users</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Index <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="category">Categories</a>
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


</body>
</html>
