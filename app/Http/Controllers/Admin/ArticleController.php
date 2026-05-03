<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\TacGia;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = BaiViet::with(['theloai', 'tacgia'])->orderBy('ma_bviet', 'asc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = TheLoai::all();
        $authors = TacGia::all();
        return view('admin.articles.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tieude' => 'required|string|max:255',
            'ten_bhat' => 'required|string|max:255',
            'ten_tloai' => 'required|string|max:255',
            'ten_tgia' => 'required|string|max:255',
            'tomtat' => 'nullable|string',
            'noidung' => 'nullable|string',
            'ngayviet' => 'required|date',
            'hinhanh' => 'nullable|string|max:255',
        ]);

        // Tìm hoặc tạo thể loại
        $theloai = TheLoai::firstOrCreate(['ten_tloai' => $request->ten_tloai]);
        // Tìm hoặc tạo tác giả
        $tacgia = TacGia::firstOrCreate(['ten_tgia' => $request->ten_tgia]);

        BaiViet::create([
            'tieude' => $request->tieude,
            'ten_bhat' => $request->ten_bhat,
            'ma_tloai' => $theloai->ma_tloai,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'ma_tgia' => $tacgia->ma_tgia,
            'ngayviet' => $request->ngayviet,
            'hinhanh' => $request->hinhanh,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Thêm bài viết thành công!');
    }

    public function edit($id)
    {
        $article = BaiViet::with(['theloai', 'tacgia'])->findOrFail($id);
        $categories = TheLoai::all();
        $authors = TacGia::all();
        return view('admin.articles.edit', compact('article', 'categories', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tieude' => 'required|string|max:255',
            'ten_bhat' => 'required|string|max:255',
            'ten_tloai' => 'required|string|max:255',
            'ten_tgia' => 'required|string|max:255',
            'tomtat' => 'nullable|string',
            'noidung' => 'nullable|string',
            'ngayviet' => 'required|date',
            'hinhanh' => 'nullable|string|max:255',
        ]);

        $article = BaiViet::findOrFail($id);

        // Tìm hoặc tạo thể loại
        $theloai = TheLoai::firstOrCreate(['ten_tloai' => $request->ten_tloai]);
        // Tìm hoặc tạo tác giả
        $tacgia = TacGia::firstOrCreate(['ten_tgia' => $request->ten_tgia]);

        $article->update([
            'tieude' => $request->tieude,
            'ten_bhat' => $request->ten_bhat,
            'ma_tloai' => $theloai->ma_tloai,
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'ma_tgia' => $tacgia->ma_tgia,
            'ngayviet' => $request->ngayviet,
            'hinhanh' => $request->hinhanh,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function destroy($id)
    {
        $article = BaiViet::findOrFail($id);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Xóa bài viết thành công!');
    }
}
