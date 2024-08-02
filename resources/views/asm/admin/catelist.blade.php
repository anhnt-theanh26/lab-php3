@extends('asm.admin.layout')
@section('title', 'Danh mục')
@section('content')
    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-2">
        <a href="{{ route('admin.cateFormAdd') }}" class="btn btn-success me-md-2" type="button">Thêm mới</a>
    </div>
    @if (session('deleteCateSuccess'))
        <div class="alert alert-success" role="alert">
            {{ session('deleteCateSuccess') }}
        </div>
    @endif
    @if (session('addCateSuccess'))
        <div class="alert alert-success" role="alert">
            {{ session('addCateSuccess') }}
        </div>
    @endif
    <h4>Danh mục</h4>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10px" scope="col">#</th>
                <th style="width: 30px" scope="col">Name</th>
                <th style="width: 60px" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
                <tr>
                    <th scope="row">{{ $cate->id }}</th>
                    <td>{{ $cate->name }}</td>
                    <td>
                        <a href="{{ route('admin.cateFormUpdate', $cate) }}" class="btn btn-warning me-md-2"
                            type="button">Sửa</a>
                        <form action="{{ route('admin.cateDelete', $cate) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Xóa danh mục sản phẩm')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
