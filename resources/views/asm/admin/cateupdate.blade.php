@extends('asm.admin.layout')
@section('title', 'Sửa danh mục')
@section('content')
    <h1>Sửa danh danh mục</h1>
    <form action="{{ route('admin.updateCate', $cate) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $cate->name }}">
            @error('name')
                <span class="text-danger">Name danh mục không được để trống và phải có 3 ký tự trở lên</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning py-2">Update</button>
        <a href="{{ route('/') }}" class="btn btn-secondary py-2">List</a>
    </form>
@endsection
