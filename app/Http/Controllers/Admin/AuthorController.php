<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TacGia;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = TacGia::orderBy('ma_tgia', 'asc')->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_tgia' => 'required|string|max:255',
        ]);

        TacGia::create([
            'ten_tgia' => $request->ten_tgia,
        ]);

        return redirect()->route('admin.authors.index')->with('success', 'Thêm tác giả thành công!');
    }

    public function edit($id)
    {
        $author = TacGia::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_tgia' => 'required|string|max:255',
        ]);

        $author = TacGia::findOrFail($id);
        $author->update([
            'ten_tgia' => $request->ten_tgia,
        ]);

        return redirect()->route('admin.authors.index')->with('success', 'Cập nhật tác giả thành công!');
    }

    public function destroy($id)
    {
        $author = TacGia::findOrFail($id);
        $author->delete();

        return redirect()->route('admin.authors.index')->with('success', 'Xóa tác giả thành công!');
    }
}
