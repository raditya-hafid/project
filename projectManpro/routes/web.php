<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/product', [MenuController::class, 'read']);

Route::resource('menu', MenuController::class);

