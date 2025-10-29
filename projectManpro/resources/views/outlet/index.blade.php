@extends('layouts.app')

@section('title', 'Outlet - Geprek GT')

@section('content')
    {{-- ===== Hero Section ===== --}}
    <section
        class="relative bg-cover bg-center flex items-center justify-center min-h-[60vh] text-white"
        style="background-image: url('{{ asset('images/bg-hero.jpg') }}');">
        <h1 class="relative z-10 text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg uppercase">
            Location
        </h1>
    </section>

    {{-- ===== Outlet Information Section ===== --}}
    <section class="bg-[#FF7B00] text-white py-20 px-6">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12">
            {{-- ===== Left: Hours & Contact ===== --}}
            <div>
                <h2 class="text-2xl font-bold mb-6">Hours of Operation</h2>
                <ul class="space-y-2 text-white/90 font-medium">
                    <li><span class="font-semibold">Mondays:</span> CLOSED</li>
                    <li><span class="font-semibold">Tuesdays:</span> 9AM – 7PM</li>
                    <li><span class="font-semibold">Wednesdays:</span> 9AM – 7PM</li>
                    <li><span class="font-semibold">Thursdays:</span> 9AM – 7PM</li>
                    <li><span class="font-semibold">Fridays:</span> 9AM – 8PM</li>
                    <li><span class="font-semibold">Saturdays:</span> 9AM – 8PM</li>
                    <li><span class="font-semibold">Sundays:</span> 9AM – 8PM</li>
                </ul>

                <h2 class="text-2xl font-bold mt-10 mb-4">Get In Touch</h2>
                <p class="text-white/90"><span class="font-semibold">Phone:</span> 0812-3456-7890</p>
                <p class="text-white/90"><span class="font-semibold">Email:</span> info@geprekgt.com</p>
                <p class="text-white/90"><span class="font-semibold">Address:</span> Jl. Slamet Riyadi No.88, Sukoharjo</p>
            </div>

            {{-- ===== Right: Google Map ===== --}}
            <div>
                <h2 class="text-2xl font-bold mb-6">Directions</h2>
                <div class="w-full h-[350px] rounded-xl overflow-hidden shadow-lg border-4 border-white/30">
                    {{-- Google Maps Embed --}}
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.540458422825!2d110.83026327476559!3d-7.632345692377319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1464bdf62e45%3A0x8b2b00e6ff9eac7a!2sSukoharjo%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1699323456789!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <p class="text-sm text-white/80 mt-3">
                    Masukkan alamat Anda di Google Maps untuk petunjuk arah lengkap menuju outlet kami.
                </p>
            </div>
        </div>
    </section>
@endsection
