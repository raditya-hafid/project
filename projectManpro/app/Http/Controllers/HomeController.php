<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $hotPromos = Menu::where('promo', 1)
                    ->orderBy('created_at', 'DESC')
                    ->take(2)
                    ->get();

        return view('home.index', compact('hotPromos'));
    }
}
