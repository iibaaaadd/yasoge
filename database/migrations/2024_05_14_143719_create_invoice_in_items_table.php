<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceInItemsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_in_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_in_id');
            $table->unsignedBigInteger('sepatu_id');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('invoice_in_id')->references('id')->on('invoice_ins')->onDelete('cascade');
            $table->foreign('sepatu_id')->references('id')->on('sepatu')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_in_items');
    }
}
