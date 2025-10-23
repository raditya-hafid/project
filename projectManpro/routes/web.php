<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::get('/enu', [MenuController::class, 'index'])->name('home');

Route::resource('menu', MenuController::class);

