@extends('layouts.admin')

@section('title', 'Admin - Bài viết')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Bài viết</h3>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-success mb-3">Thêm bài viết</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Tên tác giả</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <th scope="row">{{ $article->ma_bviet }}</th>
                                <td>{{ $article->tieude }}</td>
                                <td>{{ $article->ten_bhat }}</td>
                                <td>{{ $article->theloai->ten_tloai ?? 'N/A' }}</td>
                                <td>{{ $article->tomtat }}</td>
                                <td>{{ $article->noidung }}</td>
                                <td>{{ $article->tacgia->ten_tgia ?? 'N/A' }}</td>
                                <td>{{ $article->ngayviet }}</td>
                                <td>
                                    @if($article->hinhanh)
                                        <img src="{{ $article->hinhanh }}" class="img-fluid" alt="" style="max-width: 100px;">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.articles.edit', $article->ma_bviet) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.articles.destroy', $article->ma_bviet) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
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
