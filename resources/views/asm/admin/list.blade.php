@extends('asm.admin.layout')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="container py-4">
        <h4>Account</h4>
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
        @if (session('deleteuserseccess'))
            <div class="alert alert-success" role="alert">
                {{ session('deleteuserseccess') }}
            </div>
        @endif
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
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.onAccount', $user) }}"
                                            onclick="return confirm('Hoạt động tài khoản')">Hoạt
                                            động</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.offAccount', $user) }}"
                                            onclick="return confirm('Ngừng hoạt động tài khoản')">Ngừng
                                            hoạt động</a></li>
                                    <li>
                                        <form action="{{ route('admin.deleteUser', $user) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="dropdown-item"
                                                onclick="return confirm('Xóa tài khoản')">Xóa</button>
                                        </form>
                                    </li>
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
@endsection
