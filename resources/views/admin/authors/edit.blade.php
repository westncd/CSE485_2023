@extends('layouts.admin')

@section('title', 'Admin - Sửa tác giả')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form method="POST" action="{{ route('admin.authors.update', $author->ma_tgia) }}">
                    @csrf
                    @method('PUT')
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Mã tác giả</span>
                        <input type="text" class="form-control" value="{{ $author->ma_tgia }}" readonly>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên tác giả</span>
                        <input type="text" class="form-control @error('ten_tgia') is-invalid @enderror" name="ten_tgia" value="{{ old('ten_tgia', $author->ten_tgia) }}" required>
                        @error('ten_tgia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="{{ route('admin.authors.index') }}" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
