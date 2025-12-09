@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <div class="container mx-auto px-4 pt-40 pb-16">

        {{-- Card Utama --}}
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-5xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2">

                {{-- Kolom Kiri: Gambar Produk --}}
                {{-- Kita gunakan flex & items-center agar gambar berada di tengah vertikal jika kolom kanan lebih panjang --}}
                <div class="relative bg-gray-50 flex items-center justify-center h-full">

                    @if ($product->gambar)
                        {{-- === PERUBAHAN DISINI === --}}
                        {{-- Menggunakan Aspect Ratio sesuai permintaan --}}
                        {{-- aspect-[4/3]  : Default (Mobile) --}}
                        {{-- sm:aspect-[7/5] : Tablet ke atas --}}
                        <div class="w-full aspect-[4/3] sm:aspect-[7/5]">
                            <img src="{{ asset('uploads/' . $product->gambar) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover"
                                 loading="lazy">
                        </div>
                    @else
                        {{-- Placeholder mengikuti rasio yang sama --}}
                        <div class="w-full aspect-[4/3] sm:aspect-[7/5] bg-gray-200 flex flex-col items-center justify-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Gambar tidak tersedia</span>
                        </div>
                    @endif
                </div>

                {{-- Kolom Kanan: Informasi Produk --}}
                {{-- Gunakan h-full agar kolom ini menyeimbangkan tinggi card --}}
                <div class="p-6 md:p-10 flex flex-col justify-center h-full">

                    {{-- Judul Menu --}}
                    <h1 class="text-3xl md:text-5xl font-bold text-[#FF7B00] leading-tight mb-3"
                        style="font-family: 'Luckiest Guy', cursive;">
                        {{ $product->name }}
                    </h1>

                    {{-- Label Promo (Jika ada) --}}
                    @if ($product->promo == 1)
                        <div class="mb-4">
                            <span
                                class="bg-red-600 text-white text-xs sm:text-sm font-bold px-4 py-1.5 rounded-full inline-flex items-center gap-1 shadow-sm">
                                🔥 HOT PROMO
                            </span>
                        </div>
                    @endif

                    {{-- Harga --}}
                    <div class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 border-b pb-6 border-gray-100">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-8">
                        <h5 class="font-bold text-lg mb-2 text-gray-800">Deskripsi Menu</h5>
                        <p class="text-gray-600 text-base leading-relaxed">
                            @if ($product->description)
                                {{ $product->description }}
                            @else
                                <em class="text-gray-400">Belum ada deskripsi untuk menu ini.</em>
                            @endif
                        </p>
                    </div>

                    {{-- Area Tombol Action (Pesan & Kembali) --}}
                    <div class="flex flex-col sm:flex-row gap-3 mt-auto">

                        {{-- Tombol Pesan Sekarang (WhatsApp) --}}
                        <a href="https://wa.me/6282143539208?text={{ urlencode('Halo Admin Geprek GT, saya mau pesan menu ' . $product->name) }}"
                            target="_blank"
                            class="flex-1 inline-flex items-center justify-center gap-2 bg-[#FF7B00] text-white px-6 py-3.5 rounded-xl hover:bg-[#e06c00] transition-all duration-300 font-bold shadow-md hover:shadow-lg transform hover:-translate-y-0.5 group">
                            {{-- Icon Shopping Cart --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 group-hover:scale-110 transition-transform" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                            Pesan Sekarang
                        </a>

                        {{-- Tombol Kembali --}}
                        <a href="{{ url('/products') }}"
                            class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-[#45000F] text-white hover:bg-[#30000a] transition-colors duration-300 font-bold text-center shadow-md">
                            Kembali
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
