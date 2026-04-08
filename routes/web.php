<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama'   => 'muhammad reihano',
        'umur'   => 16,
        'alamat' => 'indonesia',
   ]);
});

Route::view('/contact', 'pages.contact');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
    
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::resource('product', ProductController::class); 
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', function () {
        return view('pages.dashboard'); 
    })->name('dashboard'); 
});