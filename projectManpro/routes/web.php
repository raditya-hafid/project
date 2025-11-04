<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OutletController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/products', [MenuController::class, 'read'])->name('products.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');

Route::get('products/{menu}', [MenuController::class, 'show'])->name('product.show');

Route::resource('menu', MenuController::class);

