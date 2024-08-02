@extends('asm.admin.layout')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="container py-4">
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
        <form action="{{ route('admin.update', Auth::user()) }}" method="post" class="pt-3" enctype="multipart/form-data">
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
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" placeholder="avatar" name="avatar"
                    value="{{ old('avatar') }}">
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                    style="object-fit: cover; object-position: center;" width="50px" height="50px" id="avt"
                    class="rounded-pill pt-1">
                @error('avatar')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Cập nhập</button>
            <a href="{{ route('admin.formUpdatePassword', Auth::user()) }}" class="btn btn-warning">Đổi mật khẩu</a>
        </form>
    </div>
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
@endsection
