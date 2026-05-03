<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->id('ma_bviet');
            $table->string('tieude');
            $table->string('ten_bhat');
            $table->unsignedBigInteger('ma_tloai');
            $table->text('tomtat')->nullable();
            $table->text('noidung')->nullable();
            $table->unsignedBigInteger('ma_tgia');
            $table->date('ngayviet')->nullable();
            $table->string('hinhanh')->nullable();
            $table->timestamps();

            $table->foreign('ma_tloai')->references('ma_tloai')->on('theloai')->onDelete('cascade');
            $table->foreign('ma_tgia')->references('ma_tgia')->on('tacgia')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('baiviet');
    }
};
