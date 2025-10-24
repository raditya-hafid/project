<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto max-w-lg mt-10 bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Menu</h2>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tampilkan error validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulir --}}
        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label for="name" class="block font-semibold">Nama Menu</label>
                <input type="text" name="name" id="name" value="{{ old('name', $menu->name) }}"
                    class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block font-semibold">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200">{{ old('description', $menu->description) }}</textarea>
            </div>

            {{-- Harga --}}
            <div>
                <label for="price" class="block font-semibold">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price', $menu->price) }}"
                    class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200" required>
            </div>

            {{-- Promo (Boolean) --}}
            <div class="flex items-center">
                <input type="hidden" name="promo" value="0">
                <input type="checkbox" name="promo" id="promo" value="1"
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded" 
                    {{ old('promo', $menu->promo) ? 'checked' : '' }}>
                <label for="promo" class="ml-2 text-gray-700">Sedang Promo?</label>
            </div>

            {{-- Gambar --}}
            <div>
                <label for="gambar" class="block font-semibold">Gambar Menu</label>
                @if($menu->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="Current image" class="w-32 h-32 object-cover">
                        <p class="text-sm text-gray-500">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" name="gambar" id="gambar" accept="image/*"
                    class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-between mt-6">
                <a href="{{ route('menu.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Kembali
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Menu
                </button>
            </div>
        </form>
    </div>
</body>

</html>