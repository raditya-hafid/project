<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/products', [ProductController::class, 'read'])->name('products.index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');


Route::resource('menu', MenuController::class);

