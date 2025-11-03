@extends('layouts.app')

@section('title', $menu->name)

@section('content')

{{-- 
  Container ini memberi padding atas (pt-24) agar konten tidak tertutup navbar fixed
  dan padding bawah (pb-12) agar tidak terlalu mepet footer.
--}}
<div class="container mx-auto px-4 pt-60 pb-12">
    
    {{-- Kartu putih untuk membungkus konten --}}
    <div class="bg-white rounded-xl shadow-2xl overflow-hidden max-w-4xl mx-auto">
        
        <div class="md:grid md:grid-cols-2">
            
            <div class="md:col-span-1">
                @if ($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                         class="w-full h-64 md:h-full object-cover">
                @else
                    <div class="w-full h-64 md:h-full bg-gray-100 flex items-center justify-center text-gray-400">
                        <span>Gambar tidak tersedia</span>
                    </div>
                @endif
            </div>

            <div class="md:col-span-1 p-6 md:p-8 flex flex-col justify-center">
                
                <h1 class="text-4xl md:text-5xl font-bold text-[#FF7B00] leading-tight mb-3"
                    style="font-family: 'Luckiest Guy', cursive;">
                    {{ $menu->name }}
                </h1>

                @if ($menu->promo == 1)
                    <span class="bg-red-600 text-white text-sm font-bold px-4 py-1 rounded-full inline-block mb-4">
                        🔥 HOT PROMO
                    </span>
                @endif

                <div class="text-4xl font-extrabold text-gray-900 mb-5">
                    Rp{{ number_format($menu->price, 0, ',', '.') }}
                </div>

                <h5 class="font-bold text-lg mb-2 text-gray-800">Deskripsi:</h5>
                <p class="text-gray-700 text-base leading-relaxed mb-6">
                    @if ($menu->description)
                        {{ $menu->description }}
                    @else
                        Deskripsi untuk {{ $menu->name }} belum tersedia.
                    @endif
                </p>

                <a href="{{ url('/products') }}" 
                   class="inline-block w-full md:w-auto text-center bg-[#45000F] text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition font-semibold">
                    &larr; Kembali ke Menu
                </a>
            </div>

        </div>

    </div>
</div>

@endsection