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
       Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); // Mengubah 'id' menjadi 'id_produk'
            $table->string('nama_produk', 150); // Menambah kolom Nama (max 150 karakter)
            $table->integer('harga'); // Menambah kolom Harga
            $table->text('deskripsi_produk'); // Menambah kolom Deskripsi
            $table->timestamps(); // Tetap biarkan ini untuk created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
