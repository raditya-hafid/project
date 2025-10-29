<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OutletController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/product', [MenuController::class, 'read']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/outlet', [OutletController::class, 'index']);

Route::resource('menu', MenuController::class);

