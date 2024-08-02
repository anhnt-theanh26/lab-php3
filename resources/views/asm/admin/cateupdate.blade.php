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
    <form action="{{ route('admin.cateUpdate', $cate) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp"
                value="{{ $cate->name }}">
            @error('name')
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Sửa</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Danh sách</a>
    </form>

@endsection
