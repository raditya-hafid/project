@extends('layouts.app')

@section('title', 'Home - Geprek GT')

@section('content')
    {{-- ===== Hero Section ===== --}}
    <section
        class="text-white text-center flex flex-col items-center justify-center min-h-screen">

        <div class="relative z-10">
            <img src="{{ asset('images/logoNew.webp') }}" alt="Logo" class="mx-auto w-40 mb-6">
            <h1 class="text-5xl font-extrabold tracking-wide mb-2 drop-shadow-lg">GEPREK GT</h1>
            <p class="text-xl mb-10 uppercase drop-shadow-md">AYAM GEPREK RESEP PAK GT</p>
            <div class="flex justify-center gap-5">
                <a href="#order"
                    class="bg-[#FF7B00] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#e46c00] transition-all shadow-lg">
                    Pre Order Now
                </a>
                <a href="#menu"
                    class="bg-white text-[#1E1E2F] px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all shadow-lg">
                    View Menu
                </a>
            </div>
        </div>
    </section>

    {{-- ===== About Section ===== --}}
    <section id="about" class="bg-[#FF7B00] text-[#1E1E2F] py-20 text-center px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6 flex items-center justify-center gap-4">
                <span class="w-12 h-[2px] bg-[#1E1E2F]"></span>
                Ayam Geprek GT
                <span class="w-12 h-[2px] bg-[#1E1E2F]"></span>
            </h2>
            <p class="text-lg font-medium leading-relaxed">
                “Nikmati sensasi ayam geprek pedas gurih dengan cita rasa khas yang bikin ketagihan.”
            </p>
        </div>
    </section>

    {{-- ===== Top Menu Section ===== --}}
    <section id="menu"
        class="text-white py-20 text-center">

        <div class="relative z-10 max-w-5xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 flex items-center justify-center gap-4">
                <span class="w-20 h-[1px] bg-white"></span>
                Top Menu
                <span class="w-20 h-[1px] bg-white"></span>
            </h2>

            <div class="grid grid-cols-2 gap-6 sm:gap-8 px-2 sm:px-0">
                {{-- Menu Card --}}
                @forelse ($hotPromos as $promo)
                    <div class="bg-white text-[#1E1E2F] rounded-2xl shadow-lg overflow-hidden hover:scale-[1.05] transition-transform duration-300">
                        {{-- GAMBAR --}}
                        @if ($promo->gambar)
                            <a href="/products/{{ $promo->id }}">
                                <img src="{{ asset('uploads/' . $promo->gambar) }}"
                                    alt="{{ $promo->name }}"
                                    class="w-full h-60 object-cover">
                            </a>
                        @else
                            <div class="w-full h-60 bg-gray-300 flex items-center justify-center text-gray-600">
                                No Image
                            </div>
                        @endif

                        {{-- LABEL CARD --}}
                        <div class="bg-red-600 text-white text-lg font-semibold py-2 uppercase">
                            Hot Promo
                        </div>

                        {{-- ISI CARD --}}
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-[#5C0000] mb-2">{{ $promo->name }}</h3>
                            <a href="/products/{{ $promo->id }}"
                                class="text-[#FF7B00] font-medium hover:underline">
                                Pesan Dahulu Sekarang
                            </a>
                            <p class="text-gray-500 text-sm mt-1">
                                Rp{{ number_format($promo->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    @empty
                        <p class="text-white text-center col-span-2">Belum ada Hot Promo tersedia.</p>
                @endforelse

            </div>
        </div>

    </section>
@endsection
