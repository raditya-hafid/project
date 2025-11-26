@extends('layouts.app')
@section('title', 'Home - Geprek GT')

@section('content')
    <div class="bg-[#45000F]">

        {{-- ================= HERO SECTION ================= --}}
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

        {{-- CONTAINER UTAMA --}}
        <div class="container mx-auto py-8 px-4 sm:px-6 md:px-10 lg:px-20">

            {{-- ================= HOT PROMO ================= --}}
            <div class="mt-4 sm:mt-8">
                <h2 class="font-bold text-white text-sm sm:text-base" style="font-family: 'Montserrat', sans-serif;">Geprek
                    GT</h2>
                <h3 class="font-bold text-[#FF7B00]"
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(1.5rem, 4vw, 2.5rem); text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                    HOT PROMO
                </h3>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6 mt-4">
                    @forelse ($products as $product)
                        @if ($product->promo == 1)
                            <div
                                class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 flex flex-col scroll-animate">

                                {{-- GAMBAR FULL ROUNDED --}}
                                @if ($product->gambar)
                                    <a href="/products/{{ $product->id }}">
                                        <div class="w-full aspect-[7/5] rounded-xl overflow-hidden">
                                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->name }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                    </a>
                                @else
                                    <div
                                        class="w-full aspect-[7/5] rounded-xl bg-gray-200 flex items-center justify-center text-gray-400">
                                        Tidak ada gambar
                                    </div>
                                @endif

                                {{-- ISI CARD --}}
                                <div class="p-4">
                                    <div class="flex justify-between items-center">
                                        <h4 class="font-bold text-gray-900 text-base md:text-lg">{{ $product->name }}</h4>
                                        <div class="text-yellow-400 text-sm">★★★★★</div>
                                    </div>

                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-gray-800 font-bold text-lg md:text-xl">
                                            Rp{{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                        <a href="/products/{{ $product->id }}"
                                            class="bg-[#FF7B00] text-white font-semibold text-sm px-4 py-2 rounded-full hover:bg-[#e86f00] transition hover:scale-90">
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

            {{-- ================= MENU BY CATEGORY ================= --}}
            <div class="mt-10">
                @forelse ($categories as $category)
                    <div class="mt-8">

                        <h2 class="font-bold text-white text-sm">Geprek GT</h2>
                        <h4 class="font-bold text-[#FF7B00]"
                            style="font-family: 'Luckiest Guy', cursive; font-size: clamp(1.5rem, 4vw, 2.5rem); text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                            {{ $category->name_kategori }}
                        </h4>

                        @php
                            $categoryProducts = $products->where('id_category', $category->id);
                        @endphp

                        @if ($categoryProducts->isNotEmpty())
                            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6">


                                @foreach ($categoryProducts as $product)
                                    <div
                                        class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 flex flex-col h-full scroll-animate">

                                        {{-- GAMBAR FULL ROUNDED --}}
                                        @if ($product->gambar)
                                            <a href="/products/{{ $product->id }}">
                                                <div class="w-full aspect-[7/5] rounded-xl overflow-hidden">
                                                    <img src="{{ asset('storage/' . $product->gambar) }}"
                                                        alt="{{ $product->name }}" class="w-full h-full object-cover">
                                                </div>
                                            </a>
                                        @else
                                            <div
                                                class="w-full aspect-[7/5] rounded-xl bg-gray-200 flex items-center justify-center text-gray-400">
                                                No Image
                                            </div>
                                        @endif

                                        {{-- ISI CARD --}}
                                        <div class="p-4 flex flex-col justify-between flex-grow">
                                            <div class="flex justify-between items-start mb-2">
                                                <h4
                                                    class="font-bold text-gray-900 text-sm md:text-lg leading-tight line-clamp-2 pr-2">
                                                    {{ $product->name }}
                                                </h4>
                                                <div class="text-yellow-400 text-xs sm:text-sm whitespace-nowrap">
                                                    ★★★★★
                                                </div>
                                            </div>

                                            <div class="flex justify-between items-center mt-auto pt-2">
                                                <p class="text-gray-800 font-bold text-base md:text-xl">
                                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                <a href="/products/{{ $product->id }}"
                                                    class="bg-[#FF7B00] text-white font-semibold text-xs sm:text-sm px-4 py-2 rounded-full hover:bg-[#e86f00] transition hover:scale-90">
                                                    Detail →
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @else
                            <p class="text-white text-sm">Belum ada menu di kategori ini.</p>
                        @endif
                    </div>
                @empty
                    <p class="text-white mt-4">Belum ada kategori yang tersedia.</p>
                @endforelse
            </div>

        </div>
    </div>

@endsection
