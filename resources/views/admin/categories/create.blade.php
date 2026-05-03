@extends('layouts.admin')

@section('title', 'Admin - Thêm thể loại')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3>
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên thể loại</span>
                        <input type="text" class="form-control @error('ten_tloai') is-invalid @enderror" name="ten_tloai" value="{{ old('ten_tloai') }}" required>
                        @error('ten_tloai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
