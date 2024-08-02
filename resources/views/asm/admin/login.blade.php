<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body>
    <div class="container pt-5">
        <h1>Login</h1>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('updateSuccess'))
            <div class="alert alert-success" role="alert">
                {{ session('updateSuccess') }}
            </div>
        @endif
        @if (session('logoutSuccess'))
            <div class="alert alert-success" role="alert">
                {{ session('logoutSuccess') }}
            </div>
        @endif
        @if (session('registerSuccess'))
            <div class="alert alert-success" role="alert">
                {{ session('registerSuccess') }}
            </div>
        @endif
        @if (session('loginError'))
            <div class="alert alert-danger" role="alert">
                {{ session('loginError') }}
            </div>
        @endif
        {{-- @if (session('errorAdmin'))
            <div class="alert alert-danger">
                {{ session('errorAdmin') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('errorLogin'))
            <div class="alert alert-danger" role="alert">
                {{ session('errorLogin') }}
            </div>
        @endif --}}
        <form action="{{ route('admin.login') }}" method="post" class="pt-3">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
            <a href="{{ route('admin.formRegister') }}" class="btn btn-warning">Register</a>
        </form>
    </div>
</body>

</html>
