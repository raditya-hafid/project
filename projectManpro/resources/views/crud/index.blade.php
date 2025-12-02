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

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                @forelse ($menus as $menu)
                    {{-- @if ($menu->id_category == 1)

                @endif --}}
                    <div class="bg-white text-[#1E1E2F] rounded-2xl shadow-lg overflow-hidden hover:scale-[1.05] transition-transform duration-300">
                        @if ($menu->gambar)
                            <div class="w-full aspect-[7/5] overflow-hidden rounded-xl">
                                <a href="/menu/{{ $menu->id }}"><img src="{{ asset('uploads/' . $menu->gambar) }}"
                                        alt="{{ $menu->name }}" class="w-full h-full object-cover"></a>
                            </div>
                        @else
                            <div
                                class="w-full aspect-[7/5] bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                                No Image
                            </div>
                        @endif



                        <div class="p-4">

                            <!-- BARIS 1: Nama & Harga -->
                            <div class="flex justify-between items-center w-full">
                                <a href="/menu/{{ $menu->id }}">
                                    <h4 class="font-bold text-lg">{{ $menu->name }}</h4>
                                </a>

                                <p class="text-[#FF7B00] font-semibold text-base">
                                    Rp{{ number_format($menu->price, 0) }}
                                </p>
                            </div>

                            <!-- BARIS 2: Edit/Hapus & Rating -->
                            <div class="flex justify-between items-center w-full mt-3">

                                <!-- Edit & Delete -->
                                <div class="flex gap-3 text-gray-500 text-xl">
                                    <a href="{{ route('menu.edit', $menu->id) }}" title="Edit">✏️</a>
                                    <button title="Hapus"
                                        onclick="openDeleteModal('{{ $menu->id }}', '{{ $menu->name }}')">
                                        🗑️
                                    </button>
                                </div>

                                <!-- Rating -->
                                <div class="text-yellow-400 text-lg">
                                    ★★★★★
                                </div>

                            </div>

                        </div>



                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-200">Belum ada menu yang ditambahkan.</p>
                @endforelse

                <!-- Delete Confirmation Modal -->
                <div id="deleteModal"
                    class="fixed inset-0 bg-black/60 flex items-center justify-center hidden z-50">

                    <div
                        class="bg-[#45000F] text-white rounded-3xl p-8 max-w-md w-full text-center shadow-2xl border border-white/20">

                        <h3 class="text-xl font-semibold mb-6">
                            Apakah Anda Yakin Ingin Menghapus Menu <span id="productName" class="font-bold text-[#FF7B00]"></span>?
                        </h3>

                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="flex justify-center gap-4">
                                <button type="submit"
                                    class="bg-red-600 px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                                    Hapus
                                </button>

                                <button type="button"
                                    onclick="closeDeleteModal()"
                                    class="bg-gray-400 px-6 py-3 rounded-lg font-semibold text-gray-900 hover:bg-gray-500 transition">
                                    Batal
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
