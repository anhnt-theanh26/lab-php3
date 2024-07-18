@extends('asm.layout')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <main class="">
        <div class="row px-4 py-4  border border-danger-subtle">
            <div class="col-md-5 col-12 border border-danger-subtle">
                <div id="carouselExampleRide" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner py-3">
                        <div class="carousel-item active">
                            <img src="{{ $clothes->image_url }}" class="d-block w-100 rounded-5"
                                style="height: 450px; object-fit: cover; object-position: center;" alt="Ảnh sản phẩm">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $clothes->image_url }}" class="d-block w-100 rounded-5"
                                style="height: 450px; object-fit: cover; object-position: center;" alt="Ảnh sản phẩm">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $clothes->image_url }}" class="d-block w-100 rounded-5"
                                style="height: 450px; object-fit: cover; object-position: center;" alt="Ảnh sản phẩm">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-7 col-12 border border-danger-subtle">
                <div class="box p-5">
                    <div class="text-break">
                        <h2>{{ $clothes->name }}</h2>
                    </div>
                    <div class="p-1">
                        <p class="text-secondary">Đã bán:<span class="text-black fs-5"> {{ $clothes->sold }}</span> sản
                            phẩm</p>
                    </div>
                    <div class="p-1">
                        <p class="text-secondary">Còn:<span class="text-black fs-5"> {{ $clothes->quantity }}</span> sản
                            phẩm</p>
                    </div>
                    <div class="p-1">
                        <p class="text-secondary">Giá cũ: <span class="text-danger text-decoration-line-through fs-4">
                                {{ number_format($clothes->price_old, 0, ',', '.') }} VNĐ</span>
                        </p>
                    </div>
                    <div class="p-1">
                        <p class="text-secondary">Giá mới: <span
                                class="fw-bold text-black fs-3">{{ number_format($clothes->price_new, 0, ',', '.') }}
                                VNĐ</span>
                        </p>
                    </div>
                    <div class="p-1">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" name="quantity" id="quantity" class="input-group-lg" value="1"
                            min="1">
                    </div>
                    <div class="pt-4">
                        <button type="button" class="btn btn-outline-primary" id="addTocart" style="width: 40%;"><i
                                class="fa-solid fa-cart-shopping"></i> Them vao gio
                            hang</button>
                        <a href="./paynow.html" class="btn btn-danger bg-danger-subtle text-black" style="width: 40%;">Mua
                            ngay</a>
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
                            <p class="text-secondary">Giá sản phẩm:</p>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="box">
                        <div class="">
                            <p class="text-black">{{ $clothes->category_id }}</p>
                            <p class="text-black">Thương hiệu sản phẩm</p>
                            <p class="text-black">{{ $clothes->name }}</p>
                            <p class="text-black">{{ number_format($clothes->price_new, 0, ',', '.') }}
                                VNĐ</p>
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
                        sản phẩm không có mô tả
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
