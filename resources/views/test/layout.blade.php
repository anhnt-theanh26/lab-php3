<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<body>
    <header class="bg-danger-subtle">
        <div class="container">
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('/') }}">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGHxny5nygQn53rs2j2hyIRkDBhG8A13Z7Gw&s"
                            alt="Bootstrap" width="" height="50">
                    </a>
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse pt-2" id="navbarSupportedContent">

                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="{{ route('/') }}">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="{{ route('allPrd', []) }}">Sản phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="#">Tin tức</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <button class="btn dropdown-toggle text-black" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Danh muc
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($category as $item)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('prdCate', $item->id) }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                            {{-- <li><a class="dropdown-item" href="#">Ao</a></li>
                                            <li><a class="dropdown-item" href="#">Giay</a></li>
                                            <li><a class="dropdown-item" href="#">Dep</a></li> --}}
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <form action="{{ route('searchPrd') }}" class="d-flex" role="search" method="GET">
                                            @csrf
                                            @method('GET')
                                            <input class="form-control rounded-pill" type="search" name="search" placeholder="Search"
                                                aria-label="Search">
                                            <a href="#" class="btn bg-danger-subtle">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn position-relative">
                                            <i class="fa-solid fa-cart-shopping fa-xl"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                                            </svg>
                                            <span class="badge bg-danger position-absolute rounded-pill top-0 end-0"
                                                style="font-size: 11px;">10</span>
                                        </button>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Login</a></li>
                                            <li><a class="dropdown-item" href="#">Singup</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </nav>

        </div>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer class="bg-danger-subtle p-4 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6">
                    <div class="box">
                        <nav class="navbar">
                            <div class="container">
                                <a class="navbar-brand" href="{{ route('/') }}">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGHxny5nygQn53rs2j2hyIRkDBhG8A13Z7Gw&s"
                                        alt="Bootstrap" width="" height="50">
                                </a>
                            </div>
                            <div class="">
                                <p class="text-black">Mở cửa: 8:00 AM</p>
                                <p class="text-black">Đóng cưa: 22:00 PM</p>
                                <p class="text-black">Thấy trai đẹp vô cùng tận bao giờ chưa</p>
                                <p class="text-black">Trai đẹp vô cùng tận đó</p>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="box">
                        <div class="">
                            <div class="">
                                <h1 class="fs-3 text-black">
                                    Liên hệ
                                </h1>
                            </div>
                            <p class="text-black">Mr: Nguyễn Thế Anh</p>
                            <p class="text-black">Sđt: 0348022004</p>
                            <p class="text-black">Email: nguyentheanh260204@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="box">
                        <div class="text-black">
                            <h1 class="fs-3">
                                Địa chỉ
                            </h1>
                            <p class="text-black">
                                Địa chỉ: Ngã 4 , đội 3, thôn Sơn Đồng, xã Tiên Phương, huyện Chương Mỹ, thành phố Hà
                                Nội
                            </p>
                            <p class="text-black">
                                Sđt: 0348022004
                            </p>
                            <p class="text-black">Email: nguyentheanh260204@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Bắt sự kiện click trên các thumbnail
        $('#thumbnailContainer').on('click', '.thumbnail', function() {
            var slideIndex = $(this).data('bs-slide-to');
            $('#carouselExampleControlsNoTouching').carousel(
                slideIndex); // Chuyển carousel đến slideIndex
        });
    });
</script>

</html>
