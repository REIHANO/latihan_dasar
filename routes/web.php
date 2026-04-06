<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    
    return view('pages.about', [
        'nama'=>'muhammad reihano',
        'umur'=>16,
        'alamat'=>'indonesia',
   ]);
});


Route::view('/contact', 'pages.contact');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/simpan', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/hapus/{id}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk.destroy');