<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
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
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.proses');
    Route::get('/beranda', function () {
        return view('pages.beranda'); 
    })->name('beranda');
});

Route::middleware('auth')->group(function () {
    Route::resource('produk', ProdukController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

