<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;

class HomeController extends Controller
{
    public function index()
    {
        $articles = BaiViet::with(['theloai', 'tacgia'])->orderBy('ma_bviet', 'asc')->get();
        return view('home', compact('articles'));
    }
}
