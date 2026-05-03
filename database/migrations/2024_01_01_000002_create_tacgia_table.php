<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tacgia', function (Blueprint $table) {
            $table->id('ma_tgia');
            $table->string('ten_tgia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tacgia');
    }
};
