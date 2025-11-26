@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="container mx-auto px-4 pt-40 pb-16">

    {{-- Card Utama --}}
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-5xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-2">

            {{-- Gambar Produk --}}
            <div class="relative">

                @if ($product->gambar)
                    <div class="w-full aspect-[7/5] overflow-hidden">
                        <img src="{{ asset('storage/' . $product->gambar) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-full aspect-[7/5] bg-gray-200 flex items-center justify-center text-gray-400">
                        Gambar tidak tersedia
                    </div>
                @endif

            </div>

            {{-- Informasi Produk --}}
            <div class="p-6 md:p-10 flex flex-col justify-center">

                <h1 class="text-4xl md:text-5xl font-bold text-[#FF7B00] leading-tight mb-4"
                    style="font-family: 'Luckiest Guy', cursive;">
                    {{ $product->name }}
                </h1>

                @if ($product->promo == 1)
                    <span class="bg-red-600 text-white text-xs sm:text-sm font-bold px-4 py-1 rounded-full inline-block mb-4">
                        🔥 HOT PROMO
                    </span>
                @endif

                <div class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                    Rp{{ number_format($product->price, 0, ',', '.') }}
                </div>

                <h5 class="font-bold text-lg mb-2 text-gray-800">Deskripsi</h5>

                <p class="text-gray-700 text-base leading-relaxed mb-8">
                    @if ($product->description)
                        {{ $product->description }}
                    @else
                        Belum ada deskripsi untuk menu ini.
                    @endif
                </p>

                {{-- Tombol kembali --}}
                <a href="{{ url('/products') }}"
                   class="inline-block text-center bg-[#45000F] text-white px-8 py-3 rounded-lg hover:bg-[#30000A] transition font-semibold w-full md:w-auto">
                    ← Kembali ke Menu
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
