<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body>
    <div class="container">
        <h1>Register</h1>

        <form action="{{ route('admin.register') }}" method="post" class="pt-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="fullname" placeholder="fullname" name="fullname"
                    value="{{ old('fullname') }}">
                @error('fullname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="username" name="username"
                    value="{{ old('username') }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="email" name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="password" name="password"
                    value="{{ old('password') }}">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" placeholder="avatar" name="avatar"
                    value="{{ old('avatar') }}">
                    <img src=""  style="object-fit: cover; object-position: center;" width="50px" height="50px"
                    id="avt" class="rounded-pill pt-1">
                @error('avatar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Register</button>
            <a href="{{ route('admin.formLogin') }}" class="btn btn-warning">Login</a>

        </form>
    </div>
</body>
<script>
    const avt = document.getElementById('avt');
    const avatar = document.getElementById('avatar');

    avatar.addEventListener('change', function(e) {
        e.preventDefault();
        const reader = new FileReader();
        reader.onload = function(event) {
            avt.src = event.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
</html>
