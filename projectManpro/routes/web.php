<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::get('/products', [ProductController::class, 'read'])->name('products.index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('menu', MenuController::class);
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});


