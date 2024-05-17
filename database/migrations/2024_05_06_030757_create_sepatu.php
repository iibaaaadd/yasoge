<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sepatu', function (Blueprint $table) {
            $table->id();
            $table->string('kode'); // Menambahkan kolom 'kode' dengan tipe string
            $table->decimal('harga', 10, 2); // Menambahkan kolom 'harga' dengan tipe decimal
            $table->string('gambar');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sepatu');
    }
};
