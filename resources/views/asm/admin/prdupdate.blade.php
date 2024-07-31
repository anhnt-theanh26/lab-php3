@extends('asm.admin.layout')
@section('title', 'Sửa sản phẩm')
@section('content')
    <h1>Sửa sản phẩm</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('admin.updatePrd', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
            @error('name')
                <span class="text-danger">Khong duoc de trong</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"
                    style="height: 150px">
                    {{ $product->description }}
                </textarea>
                <label for="description" class="form-label">Description</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="views" class="form-label">Views</label>
            <input type="number" class="form-control" name="views" id="views" value="{{ $product->views }}" readonly>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}" {{ $product->category_id === $cate->id ? 'selected' : '' }}>
                        {{ $cate->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label><br>
            <input type="file" class="form-control" id="image" name="image">
            <img id="img" src="{{ asset('storage/' . $product->image) }}" alt="image" width="50px">
            {{-- <img id="img" src="{{ $product->image }}" alt="image" width="50px"> --}}
            @error('image')
                <span class="text-danger">Image loi</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="imagesL" class="form-label">Image list</label><br>
            <input type="file" class="form-control-file" id="imagesL" name="imagesL[]" multiple>
            <div id="imagePreviews" class="mt-2" style="display: flex; flex-wrap: wrap;">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/' . $image->url) }}" alt="image" class="mr-2 mb-2 preview-img"
                        style="width: 50px;">
                @endforeach
            </div>
            @error('imagesL')
                <span class="text-danger">Image loi</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="views" class="form-label">Color</label><br>
            @foreach ($colors as $color)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="color_{{ $color->id }}"
                        value="{{ $color->id }}"
                        {{ $productColors->contains('color_id', $color->id) ? 'checked' : '' }} name="colors[]">
                    <label class="form-check-label" for="color_{{ $color->id }}">
                        {{ $color->color }}
                    </label>
                </div>
            @endforeach
        </div>
        @foreach ($productsDetails as $index => $productDetail)
            <div class="mb-3">
                <label for="" class="form-label">Sản phẩm {{ $index + 1 }}</label>
                <div class="mb-3">
                    <label for="price_{{ $index }}" class="form-label">Price</label>
                    <input type="number" class="form-control" name="products[{{ $index }}][price]"
                        id="price_{{ $index }}" value="{{ $productDetail->price }}">
                </div>
                <div class="mb-3">
                    <label for="quantity_{{ $index }}" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="products[{{ $index }}][quantity]"
                        id="quantity_{{ $index }}" value="{{ $productDetail->quantity }}">
                </div>
                <input type="hidden" name="products[{{ $index }}][id]" value="{{ $productDetail->id }}">
            </div>
            <hr>
        @endforeach
        <button type="submit" class="btn btn-warning py-2">Update</button>
        <a href="{{ route('admin.products') }}" class="btn btn-secondary py-2">List</a>
    </form>

    <script>
        var image = document.querySelector('#image');
        var img = document.querySelector('#img');
        image.addEventListener('change', function(e) {
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0])
        })
    </script>

    <script>
        document.getElementById('imagesL').addEventListener('change', function(event) {
            var files = event.target.files; // Lấy danh sách các file đã chọn
            var imagePreviews = document.getElementById('imagePreviews'); // Định vị vùng hiển thị ảnh

            // Xóa tất cả các ảnh cũ trong preview trước khi hiển thị các ảnh mới
            imagePreviews.innerHTML = '';

            // Lặp qua từng file để hiển thị ảnh mới
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader(); // Tạo một FileReader

                reader.onload = function(e) {
                    var img = document.createElement('img'); // Tạo một thẻ <img>
                    img.src = e.target.result; // Gán dữ liệu ảnh đã đọc vào thuộc tính src của <img>
                    img.className = 'mr-2 mb-2 px-1 preview-img'; // Thêm lớp để hiển thị ảnh nhỏ
                    img.style.width = '50px'; // Thiết lập chiều rộng của ảnh

                    imagePreviews.appendChild(img); // Thêm <img> vào vùng hiển thị ảnh
                };

                reader.readAsDataURL(file); // Đọc file dưới dạng Data URL
            }
        });
    </script>

@endsection
