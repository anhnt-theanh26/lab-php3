@extends('test.layout')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <main class="">
        <div class="row px-4 py-4 border border-danger-subtle">
            <div class="col-lg-5 col-md-6 col-12 border border-danger-subtle">
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                    <div class="carousel-inner py-1">
                        @foreach ($images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/'. $image->url) }}" class="d-block w-100"
                                    style="height: 400px; object-fit: cover; object-position: center;"
                                    alt="Ảnh sản phẩm {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="row py-1" id="thumbnailContainer">
                    @foreach ($images as $index => $image)
                        <div class="col-lg-3 col-md-3 col-3">
                            <img src="{{ asset('storage/'. $image->url) }}" class="thumbnail img-fluid"
                                alt="Thumbnail {{ $index + 1 }}"
                                data-bs-target="#carouselExampleControlsNoTouching"
                                data-bs-slide-to="{{ $index }}"
                                style="cursor: pointer; height: 60px; object-fit: cover; object-position: center;">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-12 border border-danger-subtle">
                <div class="box p-3">
                    <div class="text-break">
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <div class="product-details mb-4" data-product-id="">
                        <p class="text-secondary">Giá: <span
                                class="fw-bold text-black fs-3"
                                id="product-price">{{ number_format($firstRamPrice->price, 0, ',', '.') }} đ
                            </span></p>
                        <div class="mb-3">
                            <p class="text-secondary">Dung Lượng:</p>
                            <div class="fw-bold text-black fs-3" id="ram-options">
                                @foreach ($rams as $key => $ram)
                                    <label class="product-ram">
                                        <input type="radio" name="selected_ram" value="{{ $ram->idpdt }}"
                                            {{ $key === 0 ? 'checked' : '' }}>
                                        {{ $ram->ram }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="text-secondary">Color:</p>
                            <div class="fw-bold text-black fs-3" id="color-options">
                                @foreach ($colors as $color)
                                    <label class="mr-3">
                                        <input type="radio" name="selected_color" value="{{ $color->id }}">
                                        {{ $color->color }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <label for="quantity" class="input-group-text">Số lượng:</label>
                                <input type="number" name="quantity" id="quantity"
                                    class="form-control form-control-sm" value="1" min="1"
                                    style="max-width: 50px;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-primary add-to-cart"
                                style="width: 40%;"><i
                                    class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
                            <a href="" class="btn btn-danger bg-danger-subtle text-black"
                                style="width: 40%;">Mua
                                ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="bg-body-tertiary">
                <p class="fs-3">CHI TIẾT SẢN PHẨM</p>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="box">
                        <div class="">
                            <p class="text-secondary">Danh mục:</p>
                            <p class="text-secondary">Thương hiệu:</p>
                            <p class="text-secondary">Tên sản phẩm:</p>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="box">
                        <div class="">
                            <p class="text-black">{{ $product->category_id }}</p>
                            <p class="text-black">
                                @foreach ($category as $cate)
                                    @if ($cate->id === $product->category_id)
                                        {{ $cate->name }}
                                    @endif
                                @endforeach
                            </p>
                            <p class="text-black">{{ $product->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-body-tertiary">
                <p class="fs-3">MÔ TẢ SẢN PHẨM</p>
            </div>
            <div class="row g-0">
                <div class="col">
                    <div class="box fs-6 text-break">
                        {{ $product->description }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Các phần khác của template Blade -->

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Hàm định dạng giá tiền VNĐ
            function formatPrice(price) {
                var formattedPrice = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(price);
                return formattedPrice;
            }

            // Sử dụng event delegation cho nội dung được tải động
            $(document).on('change', 'input[name="selected_ram"]', function() {
                var idpdt = $(this).val(); // Lấy ID RAM đã chọn

                axios.post('{{ route('update.price') }}', {
                        idpdt: idpdt
                    })
                    .then(function(response) {
                        // Cập nhật giá sản phẩm thành giá mới nhận được từ server
                        $('#product-price').text(formatPrice(response.data));
                    })
                    .catch(function(error) {
                        console.error('Lỗi khi lấy giá:', error); // Ghi log lỗi nếu yêu cầu thất bại
                    });
            });
        });
    </script>
@endsection
