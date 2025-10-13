<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::with('user')->orderBy('created_at', 'desc')->get();

        return view('menu.index', ['menus' => $menus]);
    }
}
