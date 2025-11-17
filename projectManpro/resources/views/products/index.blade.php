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

        {{-- CONTAINER UTAMA KONTEN --}}
        <div class="container mx-auto py-8 px-4 sm:px-6 md:px-10 lg:px-20">

            {{-- ================= HOT PROMO ================= --}}
            <div class="mt-4 sm:mt-8">
                <h2 class="font-bold text-white text-sm sm:text-base" style="font-family: 'Montserrat', sans-serif;">Geprek GT</h2>
                <h3 class="font-bold text-[#FF7B00]"
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(1.5rem, 4vw, 2.5rem); text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                    HOT PROMO
                </h3>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 gap-3 sm:gap-4 md:gap-6 mt-4">
                    @forelse ($products as $product)
                        @if ($product->promo == 1)
                            {{-- TAMBAHKAN class "scroll-animate" di sini --}}
                            <div
                                class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 flex flex-col scroll-animate">
                                {{-- Gambar --}}
                                @if ($product->gambar)
                                    <a href="/products/{{ $product->id }}"><img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->name }}"
                                        class="w-full h-48 sm:h-56 md:h-64 lg:h-72 object-cover"></a>
                                @else
                                    <div
                                        class="w-full h-48 sm:h-56 md:h-64 lg:h-72 bg-gray-100 flex items-center justify-center text-gray-400">
                                        <span>Tidak ada gambar</span>
                                    </div>
                                @endif

                                {{-- Isi Card --}}
                                <div class="p-4">
                                    <div class="flex justify-between items-center">
                                        <h4 class="font-bold text-gray-900 text-base md:text-lg">{{ $product->name }}</h4>
                                        <div class="text-yellow-400 text-sm sm:text-base">★★★★★</div>
                                    </div>

                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-gray-800 font-bold text-lg md:text-xl">
                                            Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                        <a href="/products/{{ $product->id }}"
                                            class="bg-[#FF7B00] text-white font-semibold text-sm px-4 py-2 rounded-full hover:bg-[#e86f00] transition hover:scale-90 transition duration-90">
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
                        <h2 class="font-bold text-white text-sm sm:text-base" style="font-family: 'Montserrat', sans-serif;">Geprek GT</h2>
                        <h4 class="font-bold text-[#FF7B00]"
                            style="font-family: 'Luckiest Guy', cursive; font-size: clamp(1.5rem, 4vw, 2.5rem); text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
                            {{ $category->name_kategori }}
                        </h4>

                        @php
                            $categoryProducts = $products->where('id_category', $category->id);
                        @endphp

                        @if ($categoryProducts->isNotEmpty())
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
                                @foreach ($categoryProducts as $product)
                                    {{-- TAMBAHKAN class "scroll-animate" di sini --}}
                                    <div class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 flex flex-col h-full scroll-animate">

                                        {{-- Gambar --}}
                                        @if ($product->gambar)
                                            <a href="/products/{{ $product->id }}">
                                                <img src="{{ asset('storage/'. $product->gambar) }}" alt="{{ $product->name }}"
                                                class="w-full h-40 sm:h-48 md:h-56 object-cover">
                                            </a>
                                        @else
                                            <div class="w-full h-40 sm:h-48 md:h-56 bg-gray-100 flex items-center justify-center text-gray-400">
                                                <span>No Image</span>
                                            </div>
                                        @endif

                                        {{-- Isi Card --}}
                                        <div class="p-4 flex flex-col justify-between flex-grow">

                                            {{-- Baris Atas: Nama (Kiri) & Bintang (Kanan) --}}
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="font-bold text-gray-900 text-sm md:text-lg leading-tight line-clamp-2 pr-2">
                                                    {{ $product->name }}
                                                </h4>
                                                <div class="text-yellow-400 text-xs sm:text-sm whitespace-nowrap">
                                                    ★★★★★
                                                </div>
                                            </div>

                                            {{-- Baris Bawah: Harga (Kiri) & Tombol (Kanan) --}}
                                            <div class="flex justify-between items-center mt-auto pt-2">
                                                <p class="text-gray-800 font-bold text-base md:text-xl">
                                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                <a href="/products/{{ $product->id }}"
                                                    class="bg-[#FF7B00] text-white font-semibold text-xs sm:text-sm px-4 py-2 rounded-full hover:bg-[#e86f00] transition hover:scale-90 transition duration-90">
                                                    Detail →
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- End Card --}}
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

            {{-- ================= TESTIMONIAL SECTION (BARU) ================= --}}
            <div class="mt-20 mb-10">
                <div class="flex flex-col md:flex-row items-center justify-between gap-8">

                    {{-- Bagian Teks Kiri --}}
                    {{-- TAMBAHKAN class "scroll-animate" di sini --}}
                    <div class="w-full md:w-1/2 scroll-animate">
                        <h2 class="font-bold text-white text-2xl sm:text-3xl md:text-4xl leading-tight"
                            style="font-family: 'Montserrat', sans-serif;">
                            Apa Kata Pelanggan <br> Tentang Kami
                        </h2>
                    </div>

                    {{-- Bagian Gambar Kanan --}}
                    {{-- TAMBAHKAN class "scroll-animate" di sini --}}
                    <div class="w-full md:w-1/2 flex justify-center md:justify-end scroll-animate">
                        <img src="{{ asset('images/komen.png') }}"
                             alt="Apa Kata Pelanggan"
                             class="w-full max-w-md h-auto object-contain hover:scale-105 transition duration-300">
                    </div>

                </div>
            </div>
            {{-- ================= END TESTIMONIAL ================= --}}

        </div>
    </div>

    {{-- ======================================================= --}}
    {{-- ========= KODE ANIMASI SCROLL (Mulai) ============= --}}
    {{-- ======================================================= --}}
    <style>
        /* * CSS untuk animasi scroll
         * 1. .scroll-animate: Ini adalah kondisi AWAL (tersembunyi)
         * 2. .scroll-animate.is-visible: Ini adalah kondisi AKHIR (terlihat)
        */
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px); /* Mulai 30px dari bawah */
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            will-change: opacity, transform; /* Memberitahu browser untuk optimasi */
        }

        .scroll-animate.is-visible {
            opacity: 1;
            transform: translateY(0); /* Kembali ke posisi normal */
        }
    </style>

    <script>
        // Menjalankan script setelah semua konten HTML dimuat
        document.addEventListener("DOMContentLoaded", function() {

            // Cek apakah browser mendukung IntersectionObserver
            if ('IntersectionObserver' in window) {

                // Buat observer
                // Callback ini akan berjalan setiap kali elemen yang diamati masuk/keluar viewport
                let observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        // Jika elemen masuk ke viewport
                        if (entry.isIntersecting) {
                            // Tambahkan class 'is-visible' untuk memicu animasi
                            entry.target.classList.add('is-visible');

                            // (Opsional tapi disarankan) Berhenti mengamati elemen ini
                            // agar animasi tidak terulang-ulang
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    root: null, // 'null' berarti relatif ke viewport
                    threshold: 0.1 // Triger saat 10% elemen terlihat
                });

                // Dapatkan semua elemen yang ingin dianimasikan
                let elements = document.querySelectorAll('.scroll-animate');

                // Mulai amati setiap elemen
                elements.forEach(el => {
                    observer.observe(el);
                });

            } else {
                // Fallback untuk browser sangat lama (tampilkan saja semua)
                let elements = document.querySelectorAll('.scroll-animate');
                elements.forEach(el => {
                    el.classList.add('is-visible');
                });
            }
        });
    </script>
    {{-- ======================================================= --}}
    {{-- ========= KODE ANIMASI SCROLL (Selesai) ============ --}}
    {{-- ======================================================= --}}

@endsection
