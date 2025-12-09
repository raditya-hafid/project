<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('user')->orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        return view('crud.index', compact('menus', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('crud.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_category' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'promo' => 'required|boolean',
            'gambar' => 'nullable',
        ]);

        // Simpan gambar base64
        if ($request->filled('gambar')) {
            $imageData = $request->gambar;

            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                // ambil ekstensi
                $ext = strtolower($type[1]);

                if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                    return back()->withErrors(['gambar' => 'Format gambar tidak valid.']);
                }

                // decode base64
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $imageData = base64_decode($imageData);

                // nama file
                $fileName = uniqid() . '.' . $ext;
                // Gunakan public_path('uploads') agar konsisten dengan view Anda sebelumnya
                $folder = public_path('uploads');

                // pastikan folder ada
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }

                // simpan file
                file_put_contents($folder . '/' . $fileName, $imageData);

                // simpan nama file ke array data
                $validated['gambar'] = $fileName;
            }
        }

        // === TAMBAHAN DISINI ===
        // Masukkan ID user yang sedang login ke array data
        $validated['id_user'] = Auth::id();
        // =======================

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function show(Menu $menu)
    {
        return view('crud.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('crud.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_category' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'promo' => 'required|boolean',
            'cropped_image' => 'nullable|string',
        ]);

        // Jika ada gambar baru
        if ($request->filled('cropped_image')) {

            // hapus gambar lama
            if ($menu->gambar && file_exists(public_path('uploads/' . $menu->gambar))) {
                unlink(public_path('uploads/' . $menu->gambar));
            }

            $imageData = $request->cropped_image;
            $imageData = preg_replace('#^data:image/\w+;base64,#i', '', $imageData);
            $decoded = base64_decode($imageData);

            $fileName = uniqid() . '.png';
            $folder = public_path('uploads/menus');

            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            file_put_contents($folder . '/' . $fileName, $decoded);

            $validated['gambar'] = 'menus/' . $fileName;
        }

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy(Menu $menu)
    {
        // hapus file
        if ($menu->gambar && file_exists(public_path('uploads/' . $menu->gambar))) {
            unlink(public_path('uploads/' . $menu->gambar));
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
