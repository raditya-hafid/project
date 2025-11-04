<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Geprek GT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-white">

    <section class="relative absolute bg-cover min-h-screen flex items-center justify-center"
        style="background-image: url('{{ asset('images/bg-hero.jpg') }}');">

        <!-- Overlay gelap transparan agar teks lebih kontras -->
        <div class="absolute inset-0 bg-no-repeat bg-center bg-contain"
        style="background-image: url('{{ asset('images/logo.png') }}');"></div>

        <!-- Card Form -->
        <div class="relative z-10 bg-[#FFFFFF]/20 backdrop-blur-md text-white p-10 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700">
            
            <h2 class="text-2xl font-bold drop-shadow-[2px_2px_0_#000] text-center mb-8">Tambah Menu Baru</h2>

            <!-- Form -->
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                {{-- Nama Menu --}}
                <div>
                    <label for="name" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Nama Menu</label>
                    <input type="text" id="name" name="name"
                        class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none"
                        required>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="description" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Deskripsi</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full rounded-lg p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none"></textarea>
                </div>

                {{-- Harga --}}
                <div>
                    <label for="price" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Harga</label>
                    <input type="number" id="price" name="price"
                        class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none"
                        required>
                </div>

                {{-- Promo (Checkbox) --}}
                <div class="flex items-center gap-2">
                    <!-- Hidden input agar nilai 0 tetap terkirim saat checkbox tidak dicentang -->
                    <input type="hidden" name="promo" value="0">

                    <input type="checkbox" id="promo" name="promo" value="1"
                        class="h-5 w-5 text-[#FF7B00] border-gray-300 rounded focus:ring-[#FF7B00]"
                        {{ old('promo') ? 'checked' : '' }}>

                    <label for="promo" class="font-semibold drop-shadow-[2px_2px_0_#000]">Sedang Promo?</label>
                </div>

                {{-- Gambar --}}
                <div>
                    <label for="gambar" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Gambar Menu</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*"
                        class="w-full text-gray-900 file:rounded-lg file:border-none file:px-3 file:py-2 file:bg-[#FF7B00] file:text-white file:font-medium file:cursor-pointer hover:file:bg-[#e46c00] transition">
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-between mt-8">
                    <a href="/menu"
                        class="bg-[#1E1E3A] hover:bg-[#16162e] text-white font-semibold px-6 py-2 rounded-lg transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-[#FF7B00] hover:bg-[#e46c00] text-white font-semibold px-6 py-2 rounded-lg transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>
