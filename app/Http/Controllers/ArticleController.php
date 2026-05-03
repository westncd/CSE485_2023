<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;

class ArticleController extends Controller
{
    public function show($songName)
    {
        $songName = urldecode($songName);
        $articles = BaiViet::with(['theloai', 'tacgia'])
            ->where('ten_bhat', $songName)
            ->get();
        return view('detail', compact('articles', 'songName'));
    }
}
