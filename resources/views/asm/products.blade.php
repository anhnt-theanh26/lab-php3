@extends('asm.layout')
@section('title', 'Sản phẩm')
@section('content')
    <div class="row">
        <h2 class="form-control-plaintext">Sản phẩm</h2>
        @foreach ($clothes as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
                <div class="box bg-light rounded-4 border" style="height: 400px;">
                    <a href="{{ route('detail', $item->id) }}" class="link-underline-light text-black">
                        <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                            <img src="{{ $item->image_url }}" class="d-block rounded-3" alt="..."
                                style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                        </div>
                        <div class="px-2 py-2" style="height: 70px;">
                            <p class="">{{ $item->name }}</p>
                        </div>
                        <div class="d-flex justify-content-between px-3">
                            <span
                                class="text-danger text-decoration-line-through">{{ number_format($item->price_old, 0, ',', '.') }}
                                VNĐ
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
        {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 pt-3">
        <div class="box bg-light rounded-4 border" style="height: 400px;">
            <a href="#" class="link-underline-light text-black">
                <div class="img d-flex justify-content-center align-items-center" style="height: 270px;">
                    <img src="https://vending-cdn.kootoro.com/torov-cms/upload/image/1669358914523-kh%C3%A1i%20ni%E1%BB%87m%20qu%E1%BA%A3ng%20c%C3%A1o%20banner%20tr%C3%AAn%20website.jpg"
                        class="d-block rounded-3" alt="..."
                        style="width: 90%; height: 90% ;object-fit: cover; object-position: center;">
                </div>
                <div class="px-2 py-2" style="height: 70px;">
                    <p class="">name san pham</p>
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span class="text-danger text-decoration-line-through">200.000 d</span>
                    <span class="text-black">199.000 d</span>
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
    </div> --}}

    </div>
@endsection