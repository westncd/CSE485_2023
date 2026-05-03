@extends('layouts.app')

@section('title', 'Music for Life - Trang chủ')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slideshow/slide01.jpg') }}" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slideshow/slide02.jpg') }}" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slideshow/slide03.jpg') }}" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
            @forelse($articles as $article)
                <div class="col-sm-3">
                    <div class="card mb-2" style="width: 100%;">
                        @if($article->hinhanh)
                            <img src="{{ $article->hinhanh }}" class="card-img-top" alt="{{ $article->ten_bhat }}">
                        @else
                            <img src="{{ asset('images/logo2.png') }}" class="card-img-top" alt="{{ $article->ten_bhat }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-center my-title">
                                <a href="{{ route('article.detail', urlencode($article->ten_bhat)) }}" class="text-decoration-none">{{ $article->ten_bhat }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Chưa có bài hát nào.</p>
                </div>
            @endforelse
        </div>
    </main>
@endsection
