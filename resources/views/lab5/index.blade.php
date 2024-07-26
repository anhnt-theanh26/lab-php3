@extends('layout')
@section('title', 'Danh sách')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th style="width: 1%" scope="col">#</th>
                <th style="width: 15%" scope="col">title</th>
                <th style="width: 10%" scope="col">poster</th>
                <th style="width: 20%" scope="col">intro</th>
                <th style="width: 10%" scope="col">release_date</th>
                <th style="width: 10%" scope="col">genre_id</th>
                <th style="width: 20%" scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <th scope="row">{{ $movie->id }}</th>
                    <td>{{ $movie->title }}</td>
                    <td><img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" width="50px"></td>
                    <td>{{ $movie->intro }}</td>
                    <td>{{ date('d-m-Y', strtotime($movie->release_date)) }}
                    </td>
                    <td>
                        @foreach ($genes as $gene)
                            @if ($gene->id === $movie->genre_id)
                                {{ $gene->name }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('lab5.formUpdate', $movie) }}" class="btn btn-warning">Sua</a>
                        <a href="{{ route('lab5.detail', $movie) }}" class="btn btn-primary">Chi tiet</a>
                        <form action="{{ route('lab5.delete', $movie) }}" method="Post">
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
    {{ $movies->links() }}
@endsection
