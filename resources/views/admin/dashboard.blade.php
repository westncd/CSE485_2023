@extends('layouts.admin')

@section('title', 'Admin - Dashboard')

@section('content')
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="#" class="text-decoration-none">Người dùng</a>
                        </h5>
                        <h5 class="h1 text-center">{{ $countUsers }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">Thể loại</a>
                        </h5>
                        <h5 class="h1 text-center">{{ $countTheloai }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="{{ route('admin.authors.index') }}" class="text-decoration-none">Tác giả</a>
                        </h5>
                        <h5 class="h1 text-center">{{ $countTacgia }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="{{ route('admin.articles.index') }}" class="text-decoration-none">Bài viết</a>
                        </h5>
                        <h5 class="h1 text-center">{{ $countBaiviet }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
