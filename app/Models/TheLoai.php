<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = 'theloai';
    protected $primaryKey = 'ma_tloai';
    protected $fillable = ['ten_tloai'];

    public function baiviets()
    {
        return $this->hasMany(BaiViet::class, 'ma_tloai', 'ma_tloai');
    }
}
