@extends('layout')
@section('title', 'Update')

@section('content')
    <h1>Sửa phim mới</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <form action="{{ route('lab5.update', $movie) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">title -> Tiêu đề phim</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $movie->title }}" readonly>
        </div>
        <div class="mb-3">
            <label for="poster" class="form-label">poster -> Hình ảnh áp phích</label><br>
            <img src="{{ asset('storage/' . $movie->poster) }}" alt="image" width="50px" id="img">
        </div>
        <div class="mb-3">
            <label for="intro" class="form-label">intro -> Giới thiệu phim</label><br>
            <textarea name="intro" id="intro" cols="30" rows="10" readonly>{{ $movie->intro }}</textarea>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">release_date -> Ngày công chiếu</label>
            <input type="date" class="form-control" name="release_date" id="release_date"
                value="{{ $movie->release_date }}" readonly>
        </div>
        <div class="mb-3">
            <label for="genre_id" class="form-label">danh mục phim</label>
            <select class="form-select mb-3" name="genre_id" id="genre_id" aria-label="Large select example" readonly>
                @foreach ($genes as $gene)
                    @if ($gene->id === $movie->genre_id)
                        <option value="">{{ $gene->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <a href="{{ route('/') }}" class="btn btn-secondary py-2">List</a>
    </form>
    <script>
        var poster = document.querySelector('#poster');
        var img = document.querySelector('#img');
        poster.addEventListener('change', function(e) {
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0])
        })
    </script>
@endsection
