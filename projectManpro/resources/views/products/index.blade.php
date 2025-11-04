@extends('layouts.app')

@section('title', 'Home - Geprek GT')

@section('content')
<div class="bg-[#45000F]">
    {{-- BAGIAN HERO --}}
    <div class="bg-cover bg-center h-150" style="background-image: url('{{ asset('images/Rectangle.png') }}')">
        <div class="container mx-auto h-full flex items-center px-4 md:px-10">
            <div class="p-0 w-full md:w-1/2 pl-20">
                <h2 class="text-5xl font-bold text-[#FC8B26] leading-tight tracking-wider"
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(2.5rem, 5vw, 5rem); padding-left: 40px; text-shadow: 2px 5px 4px rgba(0,0,0,0.5);">
                    SENSASI PEDAS
                </h2>
                <h1 class="text-8xl font-bold text-[#FC8B26] leading-tight tracking-wider -mt-10"
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(5rem, 10vw, 10rem); padding-left: 45px; text-shadow: 2px 5px 4px rgba(0,0,0,0.5);">
                    JUARA
                </h1>
                <p class="mt-4 pl-10 text-white text-lg leading-relaxed"
                    style="font-family: 'Montserrat', sans-serif; font-size: clamp(0.8rem, 1.5vw, 1.5rem);">
                    Dibuat dari ayam segar pilihan dan sambal dadak <br>
                    yang diracik setiap hari. Rasakan bedanya!
                </p>
            </div>

            <div class="w-full md:w-1/2 hidden md:flex justify-center items-center">
                <img src="{{ asset('images/Geprek.png') }}" alt="Geprek GT" class="max-w-sm lg:max-w-md xl:max-w-lg">
            </div>
        </div>
    </div>

    {{-- BAGIAN HOT PROMO --}}
    <div class="container mx-auto py-8 px-10 md:px-20">
        <div class="mt-8 py-5">
            <h2 class="font-bold text-white"
                style="font-family: 'Montserrat', sans-serif; font-size: clamp(0.8rem, 1.5vw, 1.5rem);">
                Geprek GT
            </h2>
            <h3 class="font-bold text-[#FF7B00]"
                style="font-family: 'Luckiest Guy', cursive; font-size: 40px; text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                HOT PROMO
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                @forelse ($menus as $menu)
                    @if ($menu->promo == 1)
                        <a href="/products/{{ $menu->id }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                            @if ($menu->gambar)
                                <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                    <span>Tidak ada gambar</span>
                                </div>
                            @endif
                            <div class="p-4">
                                <h4 class="font-bold text-lg text-gray-900 hover:text-[#FF7B00] transition-colors">
                                    {{ $menu->name }}
                                </h4>
                                <p class="text-gray-600">Rp{{ number_format($menu->price, 2) }}</p>
                                <div class="flex items-center mt-2">
                                    <span class="text-yellow-400">★★★★☆</span>
                                </div>
                            </div>
                        </a>
                    @endif
                @empty
                    <p class="text-white">Belum ada promo.</p>
                @endforelse
            </div>
        </div>

        {{-- BAGIAN ALL MENU --}}
        <div class="mt-8">
            <h2 class="font-bold text-white"
                style="font-family: 'Montserrat', sans-serif; font-size: clamp(0.8rem, 1.5vw, 1.5rem);">
                Geprek GT
            </h2>
            <h3 class="font-bold text-[#FF7B00]"
                style="font-family: 'Luckiest Guy', cursive; font-size: 40px; text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                ALL MENU
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
                @forelse ($menus as $menu)
                    <a href="/products/{{ $menu->id }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        @if ($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                                <span>Tidak ada gambar</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <h4 class="font-bold text-lg text-gray-900 hover:text-[#FF7B00] transition-colors">
                                {{ $menu->name }}
                            </h4>
                            <p class="text-gray-600">Rp{{ number_format($menu->price, 2) }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-yellow-400">★★★★☆</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-white">Belum ada menu yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
