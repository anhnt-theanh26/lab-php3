@extends('asm.admin.layout')
@section('title', 'Danh mục')
@section('content')
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('admin.formAddCate') }}" class="btn btn-success">Thêm mới</a>
    </div>
    @if (session('addCate'))
        <div class="alert alert-success" role="alert">
            {{ session('addCate') }}
        </div>
    @endif
    @if (session('updateCate'))
        <div class="alert alert-success" role="alert">
            {{ session('updateCate') }}
        </div>
    @endif
    @if (session('deleteCate'))
        <div class="alert alert-success">
            {{ session('deleteCate') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th style="width: 1%" scope="col">ID</th>
                <th style="width: 15%" scope="col">Name</th>
                <th style="width: 20%" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
                <tr>
                    <th scope="row">{{ $cate->id }}</th>
                    <td>{{ $cate->name }}</td>
                    <td>
                        <a href="{{ route('admin.formUpdateCate', $cate) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.deleteCate', $cate) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Xóa danh mục')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
