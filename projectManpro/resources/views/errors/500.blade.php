@extends('layouts.app')
@section('title', 'Kesalahan Server - Geprek GT')

@section('content')
<div class="min-h-screen bg-[#45000F] flex items-center justify-center px-6">
    <div class="text-center max-w-lg">

        {{-- BAGIAN 500 --}}
        <div class="mb-8 relative flex items-center justify-center">
            <div class="absolute w-40 h-40 bg-red-500 rounded-full blur-2xl opacity-60"></div>

            <h1 class="relative text-9xl font-black text-white tracking-widest"
                style="font-family: 'Luckiest Guy', cursive; text-shadow: 4px 4px 0px red;">
                5<span class="text-red-500 text-shadow-none">0</span>0
            </h1>
        </div>

        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4"
            style="font-family: 'Montserrat', sans-serif;">
            Waduh! Dapurnya Lagi Meledak!
        </h2>

        <p class="text-gray-300 mb-8 leading-relaxed" style="font-family: 'Montserrat', sans-serif;">
            Kayaknya ada yang gosong di server kami. Tim kami sedang mencoba memperbaikinya.
            Coba balik lagi beberapa saat ya!
        </p>

        <a href="{{ url('/') }}"
           class="inline-block bg-red-600 text-white font-bold py-3 px-8 rounded-full
           hover:bg-red-700 hover:scale-105 transition duration-300 shadow-lg hover:shadow-red-500/50">
            ← Kembali ke Beranda
        </a>
    </div>
</div>

<style>
    .text-shadow-none { text-shadow: none !important; }
</style>
@endsection
