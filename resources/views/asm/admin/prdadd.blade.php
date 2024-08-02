@extends('asm.admin.layout')
@section('title', 'Sửa danh mục')
@section('content')
    <div class="py-4">
        <h4>Thêm mới sản phẩm</h4>
    </div>
    @if (session('updateCateSuccess'))
        <div class="alert alert-success" role="alert">
            {{ session('updateCateSuccess') }}
        </div>
    @endif
    @if (session('updatePrd'))
        <div class="alert alert-success" role="alert">
            {{ session('updatePrd') }}
        </div>
    @endif
    <form action="{{ route('admin.prdAdd') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                value="{{ old('name') }}">
            @error('name')
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Ảnh sản phẩm</label>
            <input type="file" class="form-control" id="image_url" name="image_url">
            <img src="" id="img" alt="Image" width="50px">
            @error('image_url')
                <p class="text-danger">Ảnh sản phẩm không được để trống</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price_old" class="form-label">Giá cũ sản phẩm</label>
            <input type="number" min="1" class="form-control" id="price_old" name="price_old"
                value="{{ old('price_old') }}">
            @error('price_old')
                <p class="text-danger">Giá sản phẩm không được để trống</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price_new" class="form-label">Giá mới sản phẩm</label>
            <input type="number" min="1" class="form-control" id="price_new" name="price_new"
                value="{{ old('price_new') }}">
            @error('price_new')
                <p class="text-danger">Giá sản phẩm không được để trống</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng sản phẩm</label>
            <input type="number" min="1" class="form-control" id="quantity" name="quantity"
                aria-describedby="emailHelp" {{ old('quantity') }}>
            @error('quantity')
                <p class="text-danger">Số lượng sản phẩm không được để trống</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Danh mục sản phẩm</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
        <a href="{{ route('admin.productsAdmin') }}" class="btn btn-secondary">Danh sách</a>
    </form>
    <script>
        var image = document.querySelector('#image_url');
        var img = document.querySelector('#img');
        image.addEventListener('change', function(e) {
            e.preventDefault();
            var reader = new FileReader();
            reader.onload = function(event) {
                img.src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endsection
