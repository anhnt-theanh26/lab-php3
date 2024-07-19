@extends('asm.layout')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <main class="">
        <div class="row px-4 py-4  border border-danger-subtle">
            <div class="col-lg-5 col-md-6 col-12 border border-danger-subtle">
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                    <div class="carousel-inner py-1">
                        @foreach ($images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $image->url }}" class="d-block w-100"
                                    style="height: 400px; object-fit: cover; object-position: center;"
                                    alt="Ảnh sản phẩm {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="row py-1" id="thumbnailContainer">
                    @foreach ($images as $index => $image)
                        <div class="col-lg-3 col-md-3 col-3">
                            <img src="{{ $image->url }}" class="thumbnail img-fluid" alt="Thumbnail {{ $index + 1 }}"
                                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide-to="{{ $index }}"
                                style="cursor: pointer; height: 60px; object-fit: cover; object-position: center;">
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-lg-7 col-md-6 col-12 border border-danger-subtle">
                <div class="box p-3">
                    <div class="text-break">
                        <h2>{{ $clothes->name }}</h2>
                    </div>
                    <div class="">
                        <p class="text-secondary">Đã bán:<span class="text-black fs-5"> {{ $clothes->sold }}</span> sản
                            phẩm</p>
                    </div>
                    <div class="">
                        <p class="text-secondary">Còn:<span class="text-black fs-5"> {{ $clothes->quantity }}</span> sản
                            phẩm</p>
                    </div>
                    <div class="">
                        <p class="text-secondary">Giá cũ: <span class="text-danger text-decoration-line-through fs-4">
                                {{ number_format($clothes->price_old, 0, ',', '.') }} VNĐ</span>
                        </p>
                    </div>
                    <div class="">
                        <p class="text-secondary">Giá mới: <span
                                class="fw-bold text-black fs-3">{{ number_format($clothes->price_new, 0, ',', '.') }}
                                VNĐ</span>
                        </p>
                    </div>
                    <div class="">
                        <div class="input-group">
                            <label for="quantity" class="input-group-text">Số lượng:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control form-control-sm" value="1" min="1" style="max-width: 50px;">
                          </div>     
                    </div>
                    <div class="py-3">
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
        <div class="py-2">
            <div class="row">
                <p class="fs-3">SẢN PHẨM TƯƠNG TỰ</p>
                @foreach ($sameClothes as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="box bg-light rounded-4 border" style="height: 400px;">
                        <a href="{{ route('detail', $item->id) }}" class="link-underline-light text-black">
                            <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                                <img src="{{$item->avatar_prd}}"
                                    class="d-block rounded-3" alt="..."
                                    style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                            </div>
                            <div class="px-2 py-2" style="height: 70px;">
                                <p class="">{{$item->name}}</p>
                            </div>
                            <div class="d-flex justify-content-between px-3">
                                <span class="text-danger text-decoration-line-through">{{ number_format($item->price_old, 0, ',', '.') }} VNĐ
                                </span>
                                <span class="text-black">{{ number_format($item->price_old, 0, ',', '.') }} VNĐ
                                </span>
                            </div>
                        </a>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn bg-danger-subtle rounded-bottom-4 w-100 btn-sm mt-1"
                                id="addTocart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                </svg> Them vao gio
                                hang</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
