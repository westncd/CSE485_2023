<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'baiviet';
    protected $primaryKey = 'ma_bviet';
    protected $fillable = [
        'tieude', 'ten_bhat', 'ma_tloai', 'tomtat',
        'noidung', 'ma_tgia', 'ngayviet', 'hinhanh'
    ];

    public function theloai()
    {
        return $this->belongsTo(TheLoai::class, 'ma_tloai', 'ma_tloai');
    }

    public function tacgia()
    {
        return $this->belongsTo(TacGia::class, 'ma_tgia', 'ma_tgia');
    }
}
