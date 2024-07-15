@extends('lab3.layout')
@section('title', 'List')
@section('content')
    <h1>Danh sách</h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 2%" scope="col">Id</th>
                <th style="width: 10%" scope="col">title</th>
                <th style="width: 10%" scope="col">thumbnail</th>
                <th style="width: 10%" scope="col">author</th>
                <th style="width: 15%" scope="col">publisher</th>
                <th style="width: 10%" scope="col">publication</th>
                <th style="width: 10%" scope="col">price</th>
                <th style="width: 5%" scope="col">quantity</th>
                <th style="width: 8%" scope="col">category_id</th>
                <th style="width: 10%" scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ $item->thumbnail }}" alt="image" width="100px"></td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->publisher }}</td>
                    <td>{{ $item->publication }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>
                        <a href="{{ route('formUpdate', $item->id) }}" class="btn btn-warning">Sua</a>
                        <form action="{{ route('delete', $item->id) }}" method="get">
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
@endsection
