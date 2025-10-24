<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Geprek GT')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen m-0 p-0">

    {{-- ===== Navbar ===== --}}
    <header class="bg-[#FF7B00] text-white sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain">
            </div>

            <nav class="hidden md:flex gap-8 text-lg font-medium">
                <a href="/" class="hover:text-[#5C0000] transition">Home</a>
                <a href="#menu" class="hover:text-[#5C0000] transition">Menu</a>
                <a href="#about" class="hover:text-[#5C0000] transition">About</a>
                <a href="#outlet" class="hover:text-[#5C0000] transition">Outlet</a>
            </nav>

            <button class="md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </header>

    {{-- ===== Main Content ===== --}}
    <main class="">
        @yield('content')
    </main>

    {{-- ===== Footer ===== --}}
    <footer class="bg-[#5C0000] text-white text-center py-10 bg-cover bg-center relative m-0"
        style="background-image: url('{{ asset('images/bg-hero.jpg') }}');">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-6 border-b border-white/30 pb-6 mb-6 text-sm md:text-base">
                <div class="flex items-center gap-2"><span>🌶️</span><span>Fresh & Spicy</span></div>
                <div class="flex items-center gap-2"><span>🍗</span><span>Authentic Flavor</span></div>
                <div class="flex items-center gap-2"><span>📍</span><span>Outlet Sukoharjo</span></div>
                <div class="flex items-center gap-2"><span>💬</span><span>Order via WhatsApp</span></div>
            </div>

            <p class="text-sm md:text-base leading-relaxed text-white/90 mb-8 max-w-2xl mx-auto">
                Menu, harga, dan promo dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya.
                Informasi di website hanya sebagai referensi.
            </p>

            <hr class="border-white/30 mb-6">

            <div class="flex justify-center gap-5 mb-6">
                <a href="#"><img src="{{ asset('images/icon-instagram.png') }}" alt="Instagram" class="w-6 h-6 hover:opacity-80 transition"></a>
                <a href="#"><img src="{{ asset('images/icon-facebook.png') }}" alt="Facebook" class="w-6 h-6 hover:opacity-80 transition"></a>
                <a href="#"><img src="{{ asset('images/icon-twitter.png') }}" alt="Twitter" class="w-6 h-6 hover:opacity-80 transition"></a>
                <a href="#"><img src="{{ asset('images/icon-whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6 hover:opacity-80 transition"></a>
            </div>

            <div class="text-xs md:text-sm text-white/90 mb-3">
                Sitemap | Privacy | Terms | Copyright © 2025 <span class="font-semibold">Geprek GT</span>
            </div>

            <div class="flex justify-center gap-8 font-medium text-sm md:text-base">
                <a href="/" class="hover:underline">Home</a>
                <a href="#about" class="hover:underline">About</a>
                <a href="#outlet" class="hover:underline">Outlet</a>
                <a href="#menu" class="hover:underline">Menu</a>
            </div>
        </div>
    </footer>

</body>


</html>
