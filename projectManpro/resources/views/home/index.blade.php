@extends('layouts.app')

@section('title', 'Home - Geprek GT')

@section('content')
    {{-- Hero Section --}}
    <section
        class="relative bg-cover bg-center text-white text-center py-28"
        style="background-image: url('{{ asset('images/bg-hero.jpg') }}');">

        <div class="relative z-10">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-40 mb-6">
            <h1 class="text-5xl font-extrabold tracking-wide mb-2">GEPREK GT</h1>
            <p class="text-xl mb-10 uppercase">AYAM GEPREK RESEP PAK GT</p>
            <div class="flex justify-center gap-5">
                <a href="#order"
                    class="bg-[#FF7B00] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#e46c00] transition-all shadow-lg">
                    Order Now
                </a>
                <a href="#menu"
                    class="bg-white text-[#1E1E2F] px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-all shadow-lg">
                    View Menu
                </a>
            </div>
        </div>
    </section>

    {{-- About Section --}}
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

    {{-- Top Menu Section --}}
    <section id="menu" class="text-white py-20 text-center bg-cover bg-center" style="background-image: url('{{ asset('images/bg-hero.jpg') }}');">
        <h2 class="text-3xl font-bold mb-12 flex items-center justify-center gap-4">
            <span class="w-20 h-[1px] bg-white"></span>
            Top Menu
            <span class="w-20 h-[1px] bg-white"></span>
        </h2>

        <div class="grid md:grid-cols-2 gap-10 max-w-5xl mx-auto">
            {{-- Menu Card 1 --}}
            <div class="bg-white text-[#1E1E2F] rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition-transform duration-300">
                <img src="{{ asset('images/menu1.jpg') }}" alt="Ayam Geprek Besar" class="w-full h-60 object-cover">
                <div class="bg-[#5C0000] text-white text-lg font-semibold py-2">Top Menu 1</div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-[#5C0000] mb-2">Ayam Geprek Besar</h3>
                    <a href="#" class="text-[#FF7B00] font-medium hover:underline">Pesan Sekarang</a>
                    <p class="text-gray-500 text-sm mt-1">(Yapping)</p>
                </div>
            </div>

            {{-- Menu Card 2 --}}
            <div class="bg-white text-[#1E1E2F] rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition-transform duration-300">
                <img src="{{ asset('images/menu1.jpg') }}" alt="Ayam Geprek Kecil" class="w-full h-60 object-cover">
                <div class="bg-[#5C0000] text-white text-lg font-semibold py-2">Top Menu 2</div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-[#5C0000] mb-2">Ayam Geprek Kecil</h3>
                    <a href="#" class="text-[#FF7B00] font-medium hover:underline">Pesan Sekarang</a>
                    <p class="text-gray-500 text-sm mt-1">(Yapping)</p>
                </div>
            </div>
        </div>
    </section>
@endsection
