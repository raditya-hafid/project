<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function read()
    {
        $products = Cache::remember('all_products', 120, function () {
            return Menu::orderBy('created_at', 'desc')->get();
        });

        $categories = Cache::remember('all_categories', 600, function () {
            return Category::all();
        });

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Menu $product)
    {
        return view('products.show', compact('product'));
    }
}

