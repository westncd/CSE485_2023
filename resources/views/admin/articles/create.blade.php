@extends('layouts.admin')

@section('title', 'Admin - Thêm bài viết')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form method="POST" action="{{ route('admin.articles.store') }}">
                    @csrf

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tiêu đề</span>
                        <input type="text" class="form-control @error('tieude') is-invalid @enderror" name="tieude" value="{{ old('tieude') }}" required>
                        @error('tieude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên bài hát</span>
                        <input type="text" class="form-control @error('ten_bhat') is-invalid @enderror" name="ten_bhat" value="{{ old('ten_bhat') }}" required>
                        @error('ten_bhat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên thể loại</span>
                        <input type="text" class="form-control @error('ten_tloai') is-invalid @enderror" name="ten_tloai" value="{{ old('ten_tloai') }}" required list="categoryList">
                        <datalist id="categoryList">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->ten_tloai }}">
                            @endforeach
                        </datalist>
                        @error('ten_tloai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên tác giả</span>
                        <input type="text" class="form-control @error('ten_tgia') is-invalid @enderror" name="ten_tgia" value="{{ old('ten_tgia') }}" required list="authorList">
                        <datalist id="authorList">
                            @foreach($authors as $auth)
                                <option value="{{ $auth->ten_tgia }}">
                            @endforeach
                        </datalist>
                        @error('ten_tgia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Ngày viết</span>
                        <input type="date" class="form-control @error('ngayviet') is-invalid @enderror" name="ngayviet" value="{{ old('ngayviet') }}" required>
                        @error('ngayviet')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Hình ảnh</span>
                        <input type="text" class="form-control" name="hinhanh" value="{{ old('hinhanh') }}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tóm tắt</span>
                        <input type="text" class="form-control" name="tomtat" value="{{ old('tomtat') }}">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Nội dung</span>
                        <input type="text" class="form-control" name="noidung" value="{{ old('noidung') }}">
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
