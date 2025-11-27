@extends('layouts.app')

@section('title', $menu->name)

@section('content')
    <div class="container mx-auto px-4 pt-[80px] pb-8 md:pt-[100px] md:pb-12">

        {{-- Card Utama --}}
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-5xl mx-auto mt-4">
            <div class="grid grid-cols-1 md:grid-cols-2 h-full">
                
                {{-- Gambar Menu - Full Height di Kiri --}}
                <div class="relative md:h-full">
                    @if ($menu->gambar)
                        <div class="w-full h-64 md:h-full">
                            <img src="{{ asset('storage/' . $menu->gambar) }}" 
                                 alt="{{ $menu->name }}"
                                 class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-full h-64 md:h-full bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-500 text-center px-4">
                                Gambar tidak tersedia
                            </span>
                        </div>
                    @endif
                </div>

                {{-- Detail Menu --}}
                <div class="p-6 md:p-8 flex flex-col">
                    {{-- Nama Menu --}}
                    <h1 class="text-3xl md:text-4xl font-bold text-[#FF7B00] mb-3 md:mb-4 leading-tight line-clamp-2"
                        style="font-family: 'Luckiest Guy', cursive; font-size: clamp(1.75rem, 4vw, 2.5rem);">
                        {{ $menu->name }}
                    </h1>

                    {{-- Badge Promo --}}
                    @if ($menu->promo == 1)
                        <div class="mb-4">
                            <span class="bg-red-600 text-white text-xs md:text-sm font-bold px-3 py-1 rounded-full inline-flex items-center gap-1">
                                🔥 HOT PROMO
                            </span>
                        </div>
                    @endif

                    {{-- Harga --}}
                    <div class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-5">
                        Rp{{ number_format($menu->price, 0, ',', '.') }}
                    </div>

                    {{-- Deskripsi --}}
                    <h5 class="font-bold text-gray-800 mb-2">Deskripsi</h5>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-6 flex-grow">
                        {{ $menu->description ?: 'Deskripsi untuk menu ini belum tersedia.' }}
                    </p>

                    {{-- Tombol Aksi — Rapi & Responsif --}}
                    <div class="space-y-3 md:space-y-0 md:space-x-3 flex flex-col md:flex-row">
                        <a href="{{ route('menu.edit', $menu->id) }}"
                            class="flex-1 bg-[#FF7B00] text-white font-semibold py-3 rounded-lg 
                                flex items-center justify-center gap-2 hover:bg-[#e86f00] transition
                                shadow-sm hover:shadow-md">
                            ✏️ <span>Edit Menu</span>
                        </a>

                        <button 
                            onclick="openDeleteModal('{{ $menu->id }}', '{{ $menu->name }}')"
                            class="flex-1 bg-red-600 text-white font-semibold py-3 rounded-lg 
                                flex items-center justify-center gap-2 hover:bg-red-700 transition
                                shadow-sm hover:shadow-md">
                            🗑️ <span>Hapus</span>
                        </button>

                        <a href="{{ route('menu.index') }}"
                            class="flex-1 bg-[#45000F] text-white font-semibold py-3 rounded-lg 
                                flex items-center justify-center gap-2 hover:bg-[#30000A] transition
                                shadow-sm hover:shadow-md">
                            ← <span>Kembali</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/60 flex items-center justify-center hidden z-50">
        <div class="bg-[#45000F] text-white rounded-2xl p-6 md:p-8 max-w-md w-full mx-4 text-center shadow-2xl border border-white/20">
            <h3 class="text-lg md:text-xl font-semibold mb-4">
                Yakin hapus menu <span id="productName" class="font-bold text-[#FF7B00]"></span>?
            </h3>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2.5 rounded-lg w-full sm:w-auto">
                        Hapus
                    </button>
                    <button type="button" onclick="closeDeleteModal()"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-5 py-2.5 rounded-lg w-full sm:w-auto">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    function openDeleteModal(id, name) {
        document.getElementById('productName').textContent = name;
        document.getElementById('deleteForm').action = `/menu/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Tutup modal saat klik di luar
    document.addEventListener('click', function(e) {
        const modal = document.getElementById('deleteModal');
        if (!modal.classList.contains('hidden') && e.target === modal) {
            closeDeleteModal();
        }
    });
</script>
@endsection