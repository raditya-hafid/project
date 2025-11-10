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
        // 🔹 Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'promo' => 'required|boolean',
            'gambar' => 'nullable',
        ]);

        //  Cek apakah gambar dikirim dalam bentuk base64 (hasil crop)
        if ($request->filled('gambar')) {
            $imageData = $request->gambar;

            // Pastikan format base64 valid
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                $image = substr($imageData, strpos($imageData, ',') + 1);
                $type = strtolower($type[1]); // jpeg, png, gif, dll

                if (!in_array($type, ['jpg', 'jpeg', 'png', 'gif'])) {
                    return back()->withErrors(['gambar' => 'Format gambar tidak didukung.']);
                }

                $image = str_replace(' ', '+', $image);
                $imageName = 'menus/' . uniqid() . '.' . $type;

                // Simpan ke storage/public/menus
                Storage::disk('public')->put($imageName, base64_decode($image));

                $validated['gambar'] = $imageName;
            } else {
                return back()->withErrors(['gambar' => 'Format base64 tidak valid.']);
            }
        }

        //  Simpan data ke database
        Menu::create($validated);

        //  Redirect dengan pesan sukses
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('crud.show', ['menu' => $menu]);
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
