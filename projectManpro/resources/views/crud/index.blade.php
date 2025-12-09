@extends('layouts.app')

@section('title', 'Dashboard - Geprek GT')

@section('content')
    <div class="bg-[#45000F] pt-1">
        {{-- ===== Hero Section ===== --}}
        <section class="bg-cover bg-center text-center py-24 mt-19 relative"
            style="background-image: url('{{ asset('images/bg-hero.webp') }}');">
            <div class="absolute inset-0"></div>

            <div class="relative z-10 max-w-3xl mx-auto px-4">
                <div
                    class="bg-white/10 backdrop-blur-md border-2 border-dashed border-white/60 rounded-2xl p-10 shadow-2xl
               ring-1 ring-white/10 transition-all duration-300 hover:bg-white/20 hover:backdrop-blur-lg">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white drop-shadow-lg">
                        Ready to share culinary creation?
                    </h2>
                    <a href="{{ route('menu.create') }}"
                        class="bg-[#FF7B00] text-white font-semibold px-6 py-3 rounded-lg shadow-lg
                    hover:bg-[#E56C00] hover:scale-105 transition-transform duration-300 inline-block">
                        Upload/Post New Food
                    </a>
                </div>
            </div>

        </section>
    </div>


    {{-- ===== Latest Dishes ===== --}}
    <section class="py-16 bg-[#45000F] text-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            <h3 class="text-2xl font-bold mb-8 border-b border-gray-600 pb-4">Your Latest Dishes</h3>

            {{-- Tetap 2 Kolom di Mobile sesuai permintaan --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-6">
                @forelse ($menus as $menu)
                    <div
                        class="bg-white text-[#1E1E2F] rounded-xl md:rounded-2xl shadow-lg overflow-hidden hover:scale-[1.02] transition-transform duration-300 flex flex-col h-full">

                        {{-- Bagian Gambar --}}
                        @if ($menu->gambar)
                            <div class="w-full aspect-[4/3] overflow-hidden relative group">
                                <a href="/menu/{{ $menu->id }}">
                                    <img src="{{ asset('uploads/' . $menu->gambar) }}" alt="{{ $menu->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                </a>
                            </div>
                        @else
                            <div
                                class="w-full aspect-[4/3] bg-gray-100 flex items-center justify-center text-gray-400 text-xs md:text-sm">
                                No Image
                            </div>
                        @endif

                        {{-- Bagian Konten --}}
                        <div class="p-2 md:p-5 flex flex-col justify-between flex-grow">

                            <div class="mb-2 md:mb-4">
                                <a href="/menu/{{ $menu->id }}" class="group block">
                                    {{-- Font judul responsif: kecil di HP, besar di Desktop --}}
                                    <h4
                                        class="font-bold text-sm md:text-lg leading-snug group-hover:text-[#FF7B00] transition line-clamp-2 mb-1">
                                        {{ $menu->name }}
                                    </h4>
                                </a>

                                <p class="text-[#FF7B00] font-bold text-xs md:text-lg whitespace-nowrap">
                                    Rp{{ number_format($menu->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="flex justify-between items-end w-full border-t border-gray-100 pt-2 md:pt-3 mt-auto">

                                <div class="flex gap-2 md:gap-3">
                                    {{-- Saya set text-base (sedang) di HP, text-xl (besar) di Desktop agar pas --}}
                                    <a href="{{ route('menu.edit', $menu->id) }}"
                                        class="text-base md:text-xl hover:scale-125 transition transform" title="Edit">
                                        ✏️
                                    </a>
                                    <button onclick="openDeleteModal('{{ $menu->id }}', '{{ $menu->name }}')"
                                        class="text-base md:text-xl hover:scale-125 transition transform"
                                        title="Hapus">
                                        🗑️
                                    </button>
                                </div>

                                <div class="flex items-center gap-0.5 md:gap-1">
                                    <span class="text-yellow-400 text-xs md:text-sm">★★★★★</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-300 py-10 italic">Belum ada menu yang ditambahkan.</p>
                @endforelse
            </div>

            <div id="deleteModal" class="fixed inset-0 bg-black/80 flex items-center justify-center hidden z-50 p-4">

                <div
                    class="bg-[#45000F] text-white rounded-3xl p-6 md:p-8 max-w-md w-full text-center shadow-2xl border border-white/20">

                    <h3 class="text-lg md:text-xl font-semibold mb-6">
                        Apakah Anda Yakin Ingin Menghapus Menu <br>
                        <span id="productName" class="font-bold text-[#FF7B00] text-xl md:text-2xl mt-2 block"></span>?
                    </h3>

                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="flex justify-center gap-3 md:gap-4">
                            <button type="submit"
                                class="bg-red-600 px-4 py-2 md:px-6 md:py-3 rounded-lg font-semibold text-sm md:text-base hover:bg-red-700 transition shadow-lg">
                                Hapus
                            </button>

                            <button type="button" onclick="closeDeleteModal()"
                                class="bg-gray-200 px-4 py-2 md:px-6 md:py-3 rounded-lg font-semibold text-sm md:text-base text-gray-900 hover:bg-gray-300 transition shadow-lg">
                                Batal
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
