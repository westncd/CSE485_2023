<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = TheLoai::orderBy('ma_tloai', 'asc')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_tloai' => 'required|string|max:255',
        ]);

        TheLoai::create([
            'ten_tloai' => $request->ten_tloai,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Thêm thể loại thành công!');
    }

    public function edit($id)
    {
        $category = TheLoai::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_tloai' => 'required|string|max:255',
        ]);

        $category = TheLoai::findOrFail($id);
        $category->update([
            'ten_tloai' => $request->ten_tloai,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật thể loại thành công!');
    }

    public function destroy($id)
    {
        $category = TheLoai::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Xóa thể loại thành công!');
    }
}
