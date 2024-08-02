@extends('asm.admin.layout')
@section('title', 'Sản phẩm')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('admin.formAddPrd') }}" class="btn btn-success">Thêm mới</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 1%" scope="col">#</th>
                <th style="width: 15%" scope="col">Name</th>
                <th style="width: 15%" scope="col">Image</th>
                <th style="width: 30%" scope="col">Description</th>
                <th style="width: 9%" scope="col">Views</th>
                <th style="width: 10%" scope="col">Category_id</th>
                <th style="width: 20%" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th class="border" scope="row">{{ $product->id }}</th>
                    <td class="border" scope="row">{{ $product->name }}</td>
                    <td class="border">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->id }}" width="50px">
                    </td>
                    <td class="border">{{ $product->description }}</td>
                    <td class="border">{{ $product->views }}</td>
                    <td class="border">{{ $product->category->name }}</td>
                    <td class="border">
                        <a href="{{ route('admin.formAddUpdate', $product) }}" class="btn btn-warning">Sua</a>
                        {{-- <a href="" class="btn btn-primary">Chi tiet</a> --}}
                        <form action="" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Xoa san pham')">Xoa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
