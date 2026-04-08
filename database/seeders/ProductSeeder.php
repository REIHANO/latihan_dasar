<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 1. TAMBAHKAN INI (Wajib agar DB bisa jalan)

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2. TAMBAHKAN KODE INSERT DI SINI
        DB::table('products')->insert([
            [
                'name' => 'Smart TV Samsung 24 inch',
                'price' => 2500000,
                'description' => 'TV LED berkualitas tinggi',
                'created_at' => now(), // 3. Tambahkan ini agar waktu input tercatat
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop Lenovo Thinkpad',
                'price' => 5000000,
                'description' => 'Laptop kencang untuk coding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}