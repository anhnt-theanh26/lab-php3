<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body>
    <header class="bg-danger-subtle">
        <div class="container">
            <nav class="navbar">
                <div class="container">
                    @if (Auth::user()->role == 'admin')
                        <a class="navbar-brand" aria-current="page"
                            href="{{ route('lab6.listUser', Auth::user()) }}">List</a>
                    @endif
                    
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse pt-2" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    {{-- <li class="nav-item">
                                        <p class="nav-link text-black" href="">Username: <span
                                                class="text-white">{{ Auth::user()->username }}</span></p>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="{{ route('lab6.home') }}"><img src="{{ asset('storage/'.Auth::user()->avatar ) }}" alt="" height="25px" width="25px" class="rounded-pill" style="object-fit: cover; object-position: center;"></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="{{ route('lab6.logout') }}">Logout:
                                            {{ Auth::user()->username }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </nav>

        </div>
    </header>
    <div class="container pt-1">
        @if (session('loginSuccess'))
            <div class="alert alert-success" role="alert">
                {{ session('loginSuccess') }}
            </div>
        @endif
        @if (session('updateSuccess'))
            <div class="alert alert-success" role="alert">
                {{ session('updateSuccess') }}
            </div>
        @endif
        <form action="{{ route('lab6.update', Auth::user()) }}" method="post" class="pt-5"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="fullname" placeholder="fullname" name="fullname"
                    value="{{ Auth::user()->fullname }}">
                @error('fullname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="username" name="username"
                    value="{{ Auth::user()->username }}">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="email" name="email"
                    value="{{ Auth::user()->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="new password" name="passwordN"
                    value="">
                @error('passwordN')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" placeholder="avatar" name="avatar"
                    value="{{ old('avatar') }}">
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"  style="object-fit: cover; object-position: center;" width="50px" height="50px"
                    id="avt" class="rounded-pill pt-1">
                @error('avatar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            {{-- <a href="{{ route('lab6.formRegister') }}" class="btn btn-warning">Register</a> --}}
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
