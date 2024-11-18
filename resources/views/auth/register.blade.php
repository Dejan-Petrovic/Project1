<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <h3>Register User</h3>
    <br>
    <form action="/register" method="POST">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Add First Name" id="name" class="form-control" required/>
            @error('title') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <br>
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Add Email" id="email" class="form-control" required/>
            @error('title') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <br>
        <div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Add Password" id="password" class="form-control" required/>
            @error('title') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <br>
        <br>
        <div>
            <button type="submit" class="btn btn-primary">REGISTER</button></a>
        </div>
    </form>
</body>
</html>
