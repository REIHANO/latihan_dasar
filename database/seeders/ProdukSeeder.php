<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 1. TAMBAHKAN INI (Wajib agar DB bisa jalan)

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2. TAMBAHKAN KODE INSERT DI SINI
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Smart TV Samsung 24 inch',
                'harga' => 2500000,
                'deskripsi_produk' => 'TV LED berkualitas tinggi',
                'created_at' => now(), // 3. Tambahkan ini agar waktu input tercatat
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Laptop Lenovo Thinkpad',
                'harga' => 5000000,
                'deskripsi_produk' => 'Laptop kencang untuk coding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}