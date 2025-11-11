<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create(
        //     [
        //         'name' => 'penjual',
        //         'email' => 'penjual@penjual.com',
        //         'password' => Hash::make('12345678'),
        //     ]
        // );

        $daftarKategori = ['Makanan', 'Minuman', 'Snack'];
        foreach ($daftarKategori as $kat) {
            Category::factory()->create([
                'name_kategori' => $kat
            ]);
        }
    }
}
