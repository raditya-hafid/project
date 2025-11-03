@extends('layouts.app')

@section('title', 'Dashboard - Geprek GT')

@section('content')
    <div class="bg-[#45000F] pt-1">
        {{-- ===== Hero Section ===== --}}
        <section class="bg-cover bg-center text-center py-24 mt-19 relative "
            style="background-image: url('{{ asset('images/bg-hero.jpg') }}');">
            <div class="absolute inset-0 "></div>

            <div class="relative z-10 max-w-3xl mx-auto">
                <div
                    class="bg-white/10 backdrop-blur-md border-2 border-dashed border-white/60 rounded-2xl p-10 shadow-2xl
               ring-1 ring-white/10 transition-all duration-300 hover:bg-white/20 hover:backdrop-blur-lg">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white drop-shadow-lg">
                        Ready to share culinary creation?
                    </h2>
                    <a href="{{ route('menu.create') }}"
                        class="bg-[#FF7B00] text-white font-semibold px-6 py-3 rounded-lg shadow-lg 
                   hover:bg-[#E56C00] hover:scale-105 transition-transform duration-300">
                        Upload/Post New Food
                    </a>
                </div>
            </div>

        </section>
    </div>


    {{-- ===== Latest Dishes ===== --}}
    <section class="py-16 bg-[#45000F] text-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-2xl font-bold mb-8">Your Latest Dishes</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">
                @forelse ($menus as $menu)
                    <div class="bg-white text-gray-800 rounded-xl shadow-lg overflow-hidden">
                        @if ($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                                class="w-full h-48 object-cover">
                        @else
                            <div
                                class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 text-sm font-medium">
                                No Image
                            </div>
                        @endif

                        <div class="p-4">
                            <a href="/products/{{ $menu->id }}"><h4 class="font-bold text-lg">{{ $menu->name }}</h4></a>
                            
                            <p class="text-[#FF7B00] font-semibold mt-1">Rp{{ number_format($menu->price, 0) }}</p>

                            <div class="flex items-center justify-between mt-3">
                                <div class="flex gap-3 text-gray-500">
                                    <a href="{{ route('menu.edit', $menu->id) }}" title="Edit">
                                        ✏️
                                    </a>
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus">🗑️</button>
                                    </form>
                                </div>
                                <div class="text-yellow-400 text-sm">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-200">Belum ada menu yang ditambahkan.</p>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('menu.index') }}"
                    class="bg-[#FF7B00] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#E56C00] transition">
                    Manage All Menu Item
                </a>
            </div>
        </div>
    </section>
@endsection
