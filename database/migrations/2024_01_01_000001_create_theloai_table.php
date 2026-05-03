<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theloai', function (Blueprint $table) {
            $table->id('ma_tloai');
            $table->string('ten_tloai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theloai');
    }
};
