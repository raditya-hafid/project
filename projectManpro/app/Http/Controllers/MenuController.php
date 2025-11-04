<?php

namespace App\Http\Controllers;

// tes

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function read()
    {
        $menus = Menu::with('user')->orderBy('created_at', 'desc')->get();

        return view('products.index', ['menus' => $menus]);
    }

    public function index()
    {
        $menus = Menu::with('user')->orderBy('created_at', 'desc')->get();

        return view('crud.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'promo' => 'required|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('menus', 'public');
            $validated['gambar'] = $path;
        }

        // Simpan data ke database
        Menu::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('products.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('crud.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'promo' => 'required|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle gambar upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }
            // Upload gambar baru
            $path = $request->file('gambar')->store('menus', 'public');
            $validated['gambar'] = $path;
        }

        // Update data menu
        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('/menu')->with('Success', 'Postingan berhasil dihapus');
    }
}
