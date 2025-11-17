@extends('layouts.app')
@section('title', 'Halaman Tidak Ditemukan - Geprek GT')

@section('content')
<div class="min-h-screen bg-[#45000F] flex items-center justify-center px-6">
    <div class="text-center max-w-lg">

        {{-- BAGIAN 404 --}}
        <div class="mb-8 relative flex items-center justify-center">

            <!-- Lingkaran Blur di Belakang -->
            <div class="absolute w-40 h-40 bg-[#FF7B00] rounded-full blur-2xl opacity-60"></div>

            <!-- Teks 404 -->
            <h1 class="relative text-9xl font-black text-white tracking-widest"
                style="font-family: 'Luckiest Guy', cursive; text-shadow: 4px 4px 0px #FF7B00;">
                4<span class="text-[#FF7B00] text-shadow-none">0</span>4
            </h1>

        </div>

        {{-- Judul --}}
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4"
            style="font-family: 'Montserrat', sans-serif;">
            Waduh! Ayamnya Kabur...
        </h2>

        {{-- Pesan --}}
        <p class="text-gray-300 mb-8 leading-relaxed" style="font-family: 'Montserrat', sans-serif;">
            Halaman yang kamu cari sepertinya sudah dimakan atau tidak tersedia.
            Coba cek kembali URL-nya atau kembali ke menu utama.
        </p>

        {{-- Tombol Kembali --}}
        <a href="{{ url('/') }}"
           class="inline-block bg-[#FF7B00] text-white font-bold py-3 px-8 rounded-full
           hover:bg-[#e86f00] hover:scale-105 transition duration-300 shadow-lg hover:shadow-orange-500/50">
            ← Kembali ke Beranda
        </a>

    </div>
</div>

{{-- Style tambahan --}}
<style>
    .text-shadow-none {
        text-shadow: none !important;
    }
</style>
@endsection
