@extends('layouts.app')

@section('title', $menu->name)

@section('content')

    <div class="container mx-auto px-4 pt-40 pb-16">

        {{-- Card Utama --}}
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-5xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2">

                {{-- Gambar Menu --}}
                <div class="relative">

                    @if ($menu->gambar)
                        <div class="w-full aspect-[7/5] overflow-hidden">
                            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                                class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-full aspect-[7/5] bg-gray-200 flex items-center justify-center text-gray-400">
                            Gambar tidak tersedia
                        </div>
                    @endif

                </div>

                {{-- Detail Menu --}}
                <div class="p-6 md:p-10 flex flex-col justify-center">

                    <h1 class="text-4xl md:text-5xl font-bold text-[#FF7B00] leading-tight mb-4"
                        style="font-family: 'Luckiest Guy', cursive;">
                        {{ $menu->name }}
                    </h1>

                    @if ($menu->promo == 1)
                        <span
                            class="bg-red-600 text-white text-xs sm:text-sm font-bold px-4 py-1 rounded-full inline-block mb-4">
                            🔥 HOT PROMO
                        </span>
                    @endif

                    <div class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                        Rp{{ number_format($menu->price, 0, ',', '.') }}
                    </div>

                    <h5 class="font-bold text-lg mb-2 text-gray-800">Deskripsi</h5>

                    <p class="text-gray-700 text-base leading-relaxed mb-8">
                        @if ($menu->description)
                            {{ $menu->description }}
                        @else
                            Deskripsi untuk menu ini belum tersedia.
                        @endif
                    </p>

                    {{-- Tombol Aksi Admin --}}
                    <div class="flex flex-col md:flex-row gap-3 md:gap-4 mt-4">

                        {{-- Tombol Edit --}}
                        <a href="{{ route('menu.edit', $menu->id) }}"
                            class="bg-[#FF7B00] text-white px-6 py-3 rounded-lg font-semibold text-center hover:bg-[#e86f00] transition w-full md:w-auto">
                            ✏️
                            <div>Edit Menu</div>

                        </a>

                        {{-- Tombol Delete --}}
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus menu ini?')" class="w-full md:w-auto">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold w-full md:w-auto hover:bg-red-700 transition">
                                🗑️ Hapus Menu
                            </button>
                        </form>

                        {{-- Tombol Kembali --}}
                        <a href="{{ route('menu.index') }}"
                            class="bg-[#45000F] text-white px-6 py-3 rounded-lg font-semibold text-center hover:bg-[#30000A] transition w-full md:w-auto">
                            ← Kembali ke Menu Admin
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
