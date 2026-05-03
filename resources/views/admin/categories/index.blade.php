@extends('layouts.admin')

@section('title', 'Admin - Thể loại')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thể loại</h3>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Thêm thể loại</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->ma_tloai }}</th>
                                <td>{{ $category->ten_tloai }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->ma_tloai) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $category->ma_tloai) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
