@extends('asm.admin.layout')
@section('title', 'Thêm mới danh mục')
@section('content')
    <h1>Thêm mới danh mục</h1>
    <form action="{{ route('admin.addCate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
            @error('name')
                <span class="text-danger">Name danh mục không được để trống và phải có 3 ký tự trở lên</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success py-2">Add</button>
        <a href="{{ route('/') }}" class="btn btn-secondary py-2">List</a>
    </form>
@endsection
