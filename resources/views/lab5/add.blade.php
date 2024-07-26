@extends('layout')
@section('title', 'Add')

@section('content')
    <h1>Thêm phim mới</h1>
    <form action="{{ route('lab5.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="title" class="form-label">title -> Tiêu đề phim</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="poster" class="form-label">poster -> Hình ảnh áp phích</label>
            <input type="file" class="form-control" name="poster" id="poster">
            <img src="" alt="image" width="50px" id="img">
        </div>
        <div class="mb-3">
            <label for="intro" class="form-label">intro -> Giới thiệu phim</label><br>
            <textarea name="intro" id="intro" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">release_date -> Ngày công chiếu</label>
            <input type="date" class="form-control" name="release_date" id="release_date">
        </div>
        <select class="form-select mb-3" name="genre_id" aria-label="Large select example">
            @foreach ($genes as $gene)
                <option value="{{ $gene->id }}">{{ $gene->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success py-2">Add</button>
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
