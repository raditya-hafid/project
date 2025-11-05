@extends('layouts.app')
@section('title', 'Home - Geprek GT')
@section('content')

    <div class="bg-[#45000F]">
        {{-- BAGIAN HERO --}}
        {{-- BAGIAN HERO --}}
        <div class="bg-cover bg-center min-h-[500px] flex items-center pt-32 md:pt-40"
            style="background-image: url('{{ asset('images/Rectangle.png') }}')">
            <div
                class="container mx-auto flex flex-col-reverse md:flex-row items-center justify-between px-6 md:px-16 lg:px-30 py-10 md:py-20">

                {{-- TEKS HERO --}}
                <div class="text-center md:text-left w-full md:w-1/2">
                    <h2 class="font-bold text-[#FC8B26] leading-tight tracking-wider"
                        style="font-family: 'Luckiest Guy', cursive; font-size: clamp(2rem, 5vw, 5rem); text-shadow: 2px 5px 4px rgba(0,0,0,0.5);">
                        SENSASI PEDAS
                    </h2>
                    <h1 class="font-bold text-[#FC8B26] leading-tight tracking-wider -mt-2 md:-mt-8"
                        style="font-family: 'Luckiest Guy', cursive; font-size: clamp(3rem, 10vw, 8rem); text-shadow: 2px 5px 4px rgba(0,0,0,0.5);">
                        JUARA
                    </h1>
                    <p class="mt-4 text-white leading-relaxed text-sm sm:text-base md:text-lg"
                        style="font-family: 'Montserrat', sans-serif;">
                        Dibuat dari ayam segar pilihan dan sambal dadak yang diracik setiap hari. <br
                            class="hidden md:block">
                        Rasakan bedanya!
                    </p>
                </div>

                {{-- GAMBAR HERO --}}
                <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0 pl-0 md:pl-10 lg:pl-40">
                    <img src="{{ asset('images/Geprek.png') }}" alt="Geprek GT"
                        class="max-w-[250px] sm:max-w-[300px] md:max-w-[400px] lg:max-w-[500px]">
                </div>
            </div>
        </div>

        {{-- BAGIAN HOT PROMO --}}
        <div class="container mx-auto py-8 px-4 sm:px-6 md:px-10 lg:px-20">
            <div class="mt-4 sm:mt-8">
                <h2 class="font-bold text-white text-sm sm:text-base" style="font-family: 'Montserrat', sans-serif;">Geprek
                    GT</h2>
                <h3 class="font-bold text-[#FF7B00] "
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(1.5rem, 4vw, 2.5rem); text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                    HOT PROMO </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6 mt-4">
                    @forelse ($menus as $menu)
                        @if ($menu->promo == 1)
                            <div
                                class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 flex flex-col">
                                {{-- Gambar --}}
                                @if ($menu->gambar)
                                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                                        class="w-full h-48 sm:h-56 md:h-64 lg:h-72 object-cover">
                                @else
                                    <div
                                        class="w-full h-48 sm:h-56 md:h-64 lg:h-72 bg-gray-100 flex items-center justify-center text-gray-400">
                                        <span>Tidak ada gambar</span>
                                    </div>
                                @endif

                                {{-- Isi Card --}}
                                <div
                                    class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 p-4">
                                    {{-- Bagian atas: nama dan rating --}}
                                    <div class="flex justify-between items-center">
                                        <h4 class="font-bold text-gray-900 text-base md:text-lg">{{ $menu->name }}</h4>
                                        <div class="text-yellow-400 text-sm sm:text-base">★★★★★</div>
                                    </div>

                                    {{-- Bagian bawah: harga dan tombol sejajar --}}
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-gray-800 font-bold text-lg md:text-xl">
                                            Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                                        <a href="/products/{{ $menu->id }}"
                                            class="bg-[#FF7B00] text-white font-semibold text-sm px-4 py-2 rounded-full hover:bg-[#e86f00] transition">
                                            Detail →
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @empty
                        <p class="text-white">Belum ada promo.</p>
                    @endforelse
                </div>

            </div>
            {{-- BAGIAN ALL MENU --}}
            <div class="mt-10">
                <h2 class="font-bold text-white text-sm sm:text-base" style="font-family: 'Montserrat', sans-serif;">Geprek
                    GT</h2>
                <h3 class="font-bold text-[#FF7B00]"
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(1.5rem, 4vw, 2.5rem); text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                    ALL MENU </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4 md:gap-6 mt-4">
                    @forelse ($menus as $menu)
                        <a href="/products/{{ $menu->id }}"
                            class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                            @if ($menu->gambar)
                                <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                                    class="w-full h-48 sm:h-56 md:h-64 lg:h-64 object-cover">
                            @else
                                <div
                                    class="w-full h-48 sm:h-56 md:h-64 lg:h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                                    <span>Tidak ada gambar</span>
                                </div>
                            @endif
                            <div class="p-2 sm:p-3">
                                <h4
                                    class="font-bold text-xs sm:text-sm md:text-lg text-gray-900 hover:text-[#FF7B00] transition-colors truncate">
                                    {{ $menu->name }} </h4>
                                <p class="text-gray-600 text-xs sm:text-sm">Rp{{ number_format($menu->price, 2) }}</p>
                                <div class="flex items-center mt-1 text-[10px] sm:text-sm"> <span
                                        class="text-yellow-400">★★★★☆</span> </div>
                            </div>
                    </a> @empty <p class="text-white">Belum ada menu yang tersedia.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
