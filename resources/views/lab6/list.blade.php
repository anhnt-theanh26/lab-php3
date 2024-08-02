<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body>
    <header class="bg-danger-subtle">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-danger-subtle">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Danh mục</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                @if (Auth::user()->role == 'admin')
                                    <a class="nav-link active"
                                        href="{{ route('admin.listUser', Auth::user()) }}">User</a>
                                @endif
                            </li>
                        </ul>
                        <div class="d-flex">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt=""
                                            height="25px" width="25px" class="rounded-pill"
                                            style="object-fit: cover; object-position: center;">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('admin.logout') }}">Logout:
                                        <span class="badge badge-danger bg-danger">{{ Auth::user()->username }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1>Account</h1>
        @if (session('userOnAccount'))
            <div class="alert alert-success" role="alert">
                {{ session('userOnAccount') }}
            </div>
        @endif
        @if (session('userOfAccount'))
            <div class="alert alert-success" role="alert">
                {{ session('userOfAccount') }}
            </div>
        @endif

        {{-- @auth
            <div class="">
                <p class="text-info">
                    Username: {{ Auth::user()->username }}
                </p>
                <p class="text-info">
                    Email: {{ Auth::user()->email }}
                </p>
                <p class="text-danger">
                    Logout: <a class="btn btn-danger" href="{{ route('admin.logout') }}">{{ Auth::user()->username }}</a>
                </p>
            </div>
        @endauth --}}
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 1%" scope="col">#</th>
                    <th style="width: 15%" scope="col">fullname</th>
                    <th style="width: 10%" scope="col">username</th>
                    <th style="width: 20%" scope="col">email</th>
                    <th style="width: 10%" scope="col">avatar</th>
                    <th style="width: 10%" scope="col">role</th>
                    <th style="width: 20%" scope="col">active</th>
                    <th style="width: 20%" scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ asset('storage/' . $user->avatar) }}" alt="" width="50px"
                                style="object-fit: cover; object-position: center;"></td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if ($user->active == 1)
                                <span class="badge badge-success bg-success">Hoạt động</span>
                            @else
                                <span class="badge badge-danger bg-danger">Ngừng hoạt động</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.onAccount', $user) }}"
                                            onclick="return confirm('Hoạt động tài khoản')">Hoạt
                                            động</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.offAccount', $user) }}"
                                            onclick="return confirm('Ngừng hoạt động tài khoản')">Ngừng
                                            hoạt động</a></li>
                                </ul>
                            </div>
                            {{-- <a href="" class="btn btn-warning">Sua</a>
                            <a href="" class="btn btn-primary">Chi tiet</a> --}}
                            {{-- <form action="{{ route('lab5.delete', $movie) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Xoa san pham')">Xoa</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
