@extends('asm.admin.layout')
@section('title', 'Thống kê')
@section('content')
    <!-- Nội dung chính -->
    <div class="container mt-4">
        <div class="row">
            <!-- Thẻ thống kê -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Số Lượng Người Dùng</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($users, 0, ',', '.') }}</h5>
                        <p class="card-text">Số lượng người dùng đã đăng ký.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Doanh Thu</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($doanhthu, 0, ',', '.') }} VNĐ</h5>
                        <p class="card-text">Doanh thu.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Đã bán</div>
                    <div class="card-body">

                        <h5 class="card-title">{{ number_format($sold, 0, ',', '.') }}</h5>
                        <p class="card-text">Số lượng sản phẩm đã bán</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biểu đồ -->
    </div>

@endsection
