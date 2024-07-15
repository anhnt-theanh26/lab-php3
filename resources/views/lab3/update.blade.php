@extends('lab3.layout')
@section('title', 'Update')
@section('content')
    <h1>Sửa</h1>
    <form method="POST" action="{{ route('update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">title -> Tiêu đề sách</label>
            <input type="hidden" class="form-control" name="id" id="id" value="{{ $product->id }}">
            <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}">
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">thumbnail -> ảnh mô tả</label>
            <input type="text" class="form-control" name="thumbnail" id="thumbnail" value="{{ $product->thumbnail }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">author -> Tác giả</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ $product->author }}">
        </div>
        <div class="mb-3">
            <label for="publisher" class="form-label">publisher -> Nhà xuất bản</label>
            <input type="text" class="form-control" name="publisher" id="publisher" value="{{ $product->publisher }}">
        </div>
        <div class="mb-3">
            <label for="publication" class="form-label">publication -> Ngày xuất bản</label>
            <input type="date" class="form-control" name="publication" id="publication"
                value="{{ $product->publication }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">price -> Giá bán</label>
            <input type="number" min="1" class="form-control" name="price" id="price"
                value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">quantity -> Số lượng</label>
            <input type="number" min="1" class="form-control" name="quantity" id="quantity"
                value="{{ $product->quantity }}">
        </div>
        {{-- <div class="mb-3">
            @foreach ($categories as $item)
            @endforeach
            <input type="text" class="form-control" id="category_id">
        </div> --}}
        <select class="form-select mb-3" aria-label="Large select example" name="category_id">
            <label for="category_id" class="form-label">category_id -> Danh mục</label>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" @if ($item->id == $product->category_id) selected @endif>{{ $item->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success py-2">Cap nhat</button>
        <a href="{{ route('/') }}" class="btn btn-secondary py-2">List</a>
    </form>
@endsection
