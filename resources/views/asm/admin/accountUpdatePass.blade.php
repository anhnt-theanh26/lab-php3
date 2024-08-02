@extends('asm.admin.layout')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="py-4">
        <h4>Đổi mật khẩu</h4>
    </div>

    @if (session('passUpdateSuccess'))
        <div class="alert alert-success" role="alert">
            {{ session('passUpdateSuccess') }}
        </div>
    @endif
    @if (session('passNew'))
        <div class="alert alert-success" role="alert">
            {{ session('passNew') }}
        </div>
    @endif
    @if (session('passError'))
        <div class="alert alert-danger" role="alert">
            {{ session('passError') }}
        </div>
    @endif
    <form action="{{ route('admin.updatePassword') }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="passOld" class="form-label">Mật khẩu cũ</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
            @error('password')
                <p class="text-danger">Mật khẩu cũ không được để và >= 3 ký tự</p>
            @enderror
            @if (session('passError'))
                <div class="text-danger">
                    {{ session('passError') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="passNew" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" id="passNew" name="passNew" value="{{ old('passNew') }}">
            @error('passNew')
                <p class="text-danger">Mật khẩu mới không được để trống và >= 3 ký tự</p>
            @enderror
            @if (session('passNewError'))
                <div class="text-danger">
                    {{ session('passNewError') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="passNewAgain" class="form-label">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-control" id="passNewAgain" name="passNewAgain"
                value="{{ old('passNewAgain') }}">
            @error('passNewAgain')
                <p class="text-danger">Mật khẩu mới không được để trống và >= 3 ký tự</p>
            @enderror
            @if (session('passAgainError'))
                <div class="text-danger">
                    {{ session('passAgainError') }}
                </div>
            @endif
            @if (session('passNewError'))
                <div class="text-danger">
                    {{ session('passNewError') }}
                </div>
            @endif

        </div>
        <button type="submit" class="btn btn-warning">Đổi mật khẩu</button>
    </form>

@endsection
