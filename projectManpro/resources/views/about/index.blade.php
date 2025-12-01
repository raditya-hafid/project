@extends('layouts.app')

@section('title', 'About - Geprek GT')

@section('content')
    <section class="min-h-screen flex items-center justify-center text-white bg-no-repeat bg-center"
        style="background-image: url('{{ asset('images/logoNew.webp') }}');
                background-size: 600px;">
        {{-- Overlay gelap transparan agar teks lebih kontras --}}
        <div class="absolute inset-0 bg-[#5C0000]/80"></div>

        <div class="relative z-10 max-w-4xl mx-auto text-center px-6 py-24">
            <h1 class="text-3xl md:text-4xl font-bold mb-6 border-t-2 border-b-2 border-white/60 inline-block py-2 px-6">
                Ayam Geprek GT
            </h1>

            <p class="text-base md:text-lg leading-relaxed text-white/90">
                Geprek GT berdiri dengan tujuan menghadirkan sajian ayam geprek yang lezat, pedas, dan selalu segar bagi
                para pecinta kuliner. Berawal dari tren kuliner ayam geprek yang semakin populer, Geprek GT berkomitmen
                untuk memberikan kualitas rasa terbaik dengan harga yang tetap ramah di kantong. Dengan pilihan menu yang
                beragam serta suasana hangat yang kami hadirkan, Geprek GT ingin menjadi pilihan utama bagi siapa saja yang
                mencari hidangan praktis namun penuh cita rasa.
            </p>

            <p class="text-base md:text-lg leading-relaxed text-white/90 mt-4">
                Website ini dibuat untuk memudahkan pelanggan dalam mengenal menu, menemukan lokasi outlet, serta mendapatkan
                informasi promo terbaru secara cepat dan mudah.
            </p>
        </div>

    </section>
@endsection
