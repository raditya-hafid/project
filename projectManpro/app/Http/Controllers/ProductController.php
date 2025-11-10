<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function read()
    {
        $products = Menu::with('user')->orderBy('created_at', 'desc')->get();

        return view('products.index', ['products' => $products]);
    }

    public function show(Menu $product)
    {
        return view('products.show', ['product' => $product]);
    }
}
