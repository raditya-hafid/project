@extends('layouts.app')

@section('title', 'Home - Geprek GT')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-darkred text-white text-center py-24 relative">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-36 mb-6">
        <h1 class="text-4xl font-bold mb-2">GEPREK GT</h1>
        <p class="text-lg mb-8">Ayam Geprek Resep Pak GT</p>
        <div class="flex justify-center gap-4">
            <a href="#order" class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-500 transition">
                Order Now
            </a>
            <a href="#menu" class="bg-white text-darkred px-6 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                View Menu
            </a>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="bg-primary text-center text-darkred py-16 px-6">
        <h2 class="text-2xl font-bold mb-4">Ayam Geprek GT</h2>
        <p class="max-w-2xl mx-auto text-lg font-medium">
            “Nikmati sensasi ayam geprek pedas gurih dengan cita rasa khas yang bikin ketagihan.”
        </p>
    </section>

    {{-- Top Menu Section --}}
    <section id="menu" class="bg-cream py-16 px-6 text-center">
        <h2 class="text-3xl font-bold text-darkred mb-10">Top Menu</h2>
        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img src="{{ asset('images/menu1.jpg') }}" alt="Menu 1" class="w-full h-56 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-darkred mb-2">Ayam Geprek Besar</h3>
                    <a href="#" class="text-primary font-medium hover:underline">Pesan Sekarang</a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img src="{{ asset('images/menu2.jpg') }}" alt="Menu 2" class="w-full h-56 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-darkred mb-2">Ayam Geprek Kecil</h3>
                    <a href="#" class="text-primary font-medium hover:underline">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </section>
@endsection
