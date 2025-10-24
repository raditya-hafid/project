<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <a href="{{ route('menu.create') }}">
        <p>Create</p>
    </a>
    <div class="mt-8">
        <h3 class="text-2xl font-bold text-[#FF7B00]">ALL MENU</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            @forelse ($menus as $menu)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if ($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                            class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                            <span>Tidak ada gambar</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h4 class="font-bold text-lg">{{ $menu->name }}</h4>
                        <p class="text-gray-600">Rp{{ number_format($menu->price, 2) }}</p>
                        <div class="flex items-center mt-2">
                            <a href="/menu/{{ $menu->id }}}/edit"
                                style="display: inline-block; margin-top: 1rem; margin-left: 1rem;">Edit Postingan</a>
                            <form action="/menu/{{ $menu->id }}" method="POST"
                                style="display: inline-block; margin-left: 1rem;">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    style="background-color: #dc3545; color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;"
                                    onclick="return confirm('Hapus Postingan Ini?')">
                                    Hapus
                                </button>
                            </form>
                            {{-- <span class="text-yellow-400">★★★★☆</span> --}}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-white">Belum ada menu yang tersedia.</p>
            @endforelse
        </div>
    </div>
</body>

</html>
