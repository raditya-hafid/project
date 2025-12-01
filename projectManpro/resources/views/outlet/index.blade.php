@extends('layouts.app')

@section('title', 'Outlet - Geprek GT')

@section('content')
    {{-- ===== Hero Section ===== --}}
    <section
        class="relative bg-cover bg-center flex items-center justify-center min-h-[60vh] font-bold text-white"
        style="background-image: url('{{ asset('images/otlet full.webp') }}');">
        <h1 class="relative z-10 text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg uppercase"
            style="font-family: 'Luckiest Guy', cursive; font-size: clamp(2.5rem, 10vw, 5rem); text-shadow: 2px 3px 3px rgba(0,0,0,0.4);">
            Lokasi
        </h1>
        <div class="absolute inset-0 bg-[#7D7D7D]/80"></div>
    </section>

    {{-- ===== Outlet Information Section ===== --}}
    <section class="bg-[#FF7B00] text-white py-20 px-6">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12">
            {{-- ===== Left: Hours & Contact ===== --}}
            <div>
                <h2 class="text-2xl font-bold mb-6 drop-shadow-[2px_2px_0_#000]">Jam Buka</h2>
                <ul class="space-y-2 text-white/90 font-medium">
                    <li><span class="font-semibold">Senin:</span> 9AM – 7PM</li>
                    <li><span class="font-semibold">Selasa:</span> 9AM – 7PM</li>
                    <li><span class="font-semibold">Rabu:</span> 9AM – 7PM</li>
                    <li><span class="font-semibold">Kamis:</span> 9AM – 7PM</li>
                    <li><span class="font-semibold">Jumat:</span> 9AM – 8PM</li>
                    <li><span class="font-semibold">Sabtu:</span> 9AM – 8PM</li>
                    <li><span class="font-semibold">Minggu:</span> 9AM – 8PM</li>
                </ul>

                <h2 class="text-2xl font-bold mt-10 mb-4 drop-shadow-[2px_2px_0_#000]">Pre Order Sekarang</h2>
                <p class="text-white/90"><span class="font-semibold">Pesan langsung melalui Whatsapp, hubungi nomor dibawah ini</span></p>
                <p class="text-white/90"><span class="font-semibold">Whatsapp:</span> 0812-3456-7890</p>
                <p class="text-white/90"><span class="font-semibold">Alamat:</span> Jl. Slamet Riyadi No.88, Sukoharjo</p>
            </div>

            {{-- ===== Right: Google Map ===== --}}
            <div>
                <h2 class="text-2xl font-bold mb-6 drop-shadow-[2px_2px_0_#000]">Lokasi Outlet Kami</h2>
                <div class="w-full h-[350px] rounded-xl overflow-hidden shadow-lg border-4 border-white/30">
                    {{-- Google Maps Embed --}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3953.8610516611775!2d110.892572!3d-7.6980569999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwNDEnNTMuMCJTIDExMMKwNTMnMzMuMyJF!5e0!3m2!1sen!2sid!4v1762163815053!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <p class="text-sm text-white/80 mt-3">
                    Pepen RT003 RW011,  Mertan, Kec. Bendosari, Kabupaten Sukoharjo, Jawa Tengah 57528
                </p>
            </div>
        </div>
    </section>
@endsection
