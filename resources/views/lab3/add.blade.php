@extends('lab3.layout')
@section('title', 'Add')

@section('content')
    <h1>Thêm</h1>
    <form action="{{ route('add') }}" method="POST">
        @csrf
        @method('Post')
        <div class="mb-3">
            <label for="title" class="form-label">title -> Tiêu đề sách</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">thumbnail -> ảnh mô tả</label>
            <input type="text" class="form-control" name="thumbnail" id="thumbnail">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">author -> Tác giả</label>
            <input type="text" class="form-control" name="author" id="author">
        </div>
        <div class="mb-3">
            <label for="publisher" class="form-label">publisher -> Nhà xuất bản</label>
            <input type="text" class="form-control" name="publisher" id="publisher">
        </div>
        <div class="mb-3">
            <label for="publication" class="form-label">publication -> Ngày xuất bản</label>
            <input type="date" class="form-control" name="publication" id="publication">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">price -> Giá bán</label>
            <input type="number" min="1" class="form-control" name="price" id="price">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">quantity -> Số lượng</label>
            <input type="number" min="1" class="form-control" name="quantity" id="quantity">
        </div>
        <select class="form-select mb-3" name="category_id" aria-label="Large select example">
            <option value="1">Danh mục</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success py-2">Add</button>
        <a href="{{ route('/') }}" class="btn btn-secondary py-2">List</a>
    </form>
@endsection
