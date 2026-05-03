@extends('layouts.app')

@section('title', 'Music for Life - ' . $songName)

@section('content')
    <main class="container mt-5">
        <div class="row mb-5">
            @forelse($articles as $article)
                <div class="col-sm-4">
                    <img src="{{ $article->hinhanh }}" class="img-fluid" alt="{{ $article->ten_bhat }}">
                </div>
                <div class="col-sm-8">
                    <h5 class="card-title mb-2">
                        <a href="#" class="text-decoration-none">{{ $article->tieude }}</a>
                    </h5>
                    <p class="card-text"><span class="fw-bold">Bài hát: </span>{{ $article->ten_bhat }}</p>
                    <p class="card-text"><span class="fw-bold">Thể loại: </span>{{ $article->theloai->ten_tloai ?? 'N/A' }}</p>
                    <p class="card-text"><span class="fw-bold">Tóm tắt: </span>{{ $article->tomtat }}</p>
                    <p class="card-text"><span class="fw-bold">Nội dung: </span>{{ $article->noidung }}</p>
                    <p class="card-text"><span class="fw-bold">Tác giả: </span>{{ $article->tacgia->ten_tgia ?? 'N/A' }}</p>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Không tìm thấy bài viết cho bài hát này.</p>
                </div>
            @endforelse
        </div>
    </main>
@endsection
