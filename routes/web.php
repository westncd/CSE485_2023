<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

// ==================== PUBLIC ROUTES ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{song}', [ArticleController::class, 'show'])->name('article.detail');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Thể loại
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Tác giả
    Route::resource('authors', AuthorController::class)->except(['show']);

    // Bài viết
    Route::resource('articles', AdminArticleController::class)->except(['show']);
});
