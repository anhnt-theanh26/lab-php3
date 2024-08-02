@extends('asm.admin.layout')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="py-4">
        <h4>Sửa danh mục sản phẩm</h4>
    </div>
    @if (session('updateCateSuccess'))
        <div class="alert alert-success" role="alert">
            {{ session('updateCateSuccess') }}
        </div>
    @endif
    <form action="{{ route('admin.cateAdd') }}" method="POST">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp"
                value="{{ old('name') }}">
            @error('name')
                <p class="text-danger">Tên danh mục không được để trống hoặc < 3 ký tự </p>
                    @enderror
        </div>

        <button type="submit" class="btn btn-success">Thêm mới</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Danh sách</a>
    </form>

@endsection
