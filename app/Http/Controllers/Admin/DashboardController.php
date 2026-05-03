<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\TacGia;
use App\Models\TheLoai;

class DashboardController extends Controller
{
    public function index()
    {
        $countTheloai = TheLoai::count();
        $countTacgia = TacGia::count();
        $countBaiviet = BaiViet::count();
        $countUsers = \App\Models\User::count();

        return view('admin.dashboard', compact('countTheloai', 'countTacgia', 'countBaiviet', 'countUsers'));
    }
}
