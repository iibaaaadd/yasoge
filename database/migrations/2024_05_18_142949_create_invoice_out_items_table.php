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
        Schema::create('invoice_out_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_out_id');
            $table->unsignedBigInteger('sepatu_id');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('invoice_out_id')->references('id')->on('invoice_outs')->onDelete('cascade');
            $table->foreign('sepatu_id')->references('id')->on('sepatu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_out_items');
    }
};
