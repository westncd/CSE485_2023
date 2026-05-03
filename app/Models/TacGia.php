<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    protected $table = 'tacgia';
    protected $primaryKey = 'ma_tgia';
    protected $fillable = ['ten_tgia'];

    public function baiviets()
    {
        return $this->hasMany(BaiViet::class, 'ma_tgia', 'ma_tgia');
    }
}
