@extends('layouts.admin')

@section('title', 'Admin - Tác giả')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Tác giả</h3>
                <a href="{{ route('admin.authors.create') }}" class="btn btn-success mb-3">Thêm tác giả</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <th scope="row">{{ $author->ma_tgia }}</th>
                                <td>{{ $author->ten_tgia }}</td>
                                <td>
                                    <a href="{{ route('admin.authors.edit', $author->ma_tgia) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.authors.destroy', $author->ma_tgia) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
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
