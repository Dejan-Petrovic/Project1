<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<h3>Login</h3>
<br>
<form action="/login" method="POST">
    @csrf


        <label>Email</label>
        <input type="email" name="email" placeholder="Add Email" id="email" class="form-control" value="{{old('email')}}" required/>
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    <br>
    <div>
        <label>Password</label>
        <input type="password" name="password" placeholder="Add Password" id="password" class="form-control" required/>
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary">LOGIN</button></a>
    </div>
</form>
</body>
</html>
