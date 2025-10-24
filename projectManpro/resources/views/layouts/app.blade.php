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

<body class="font-sans text-[#1E1E2F] bg-[#FFF6E9] selection:bg-[#FF7B00]/70 selection:text-white">

    {{-- ===== Navbar ===== --}}
    <header class="bg-[#FF7B00] text-white sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
            {{-- Logo & Brand --}}
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain">
                <span class="text-2xl font-extrabold tracking-wide">Geprek GT</span>
            </div>

            {{-- Menu --}}
            <nav class="hidden md:flex gap-8 text-lg font-medium">
                <a href="/" class="hover:text-[#5C0000] transition">Home</a>
                <a href="#menu" class="hover:text-[#5C0000] transition">Menu</a>
                <a href="#about" class="hover:text-[#5C0000] transition">About</a>
                <a href="#outlet" class="hover:text-[#5C0000] transition">Outlet</a>
            </nav>

            {{-- Burger (mobile) --}}
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
    <main>
        @yield('content')
    </main>

    {{-- ===== Footer ===== --}}
    <footer class="bg-[#5C0000] text-white text-center py-10 mt-20">
        <div class="flex justify-center gap-6 mb-5">
            <img src="{{ asset('images/icon-facebook.png') }}" alt="Facebook" class="w-6 h-6 hover:opacity-80 transition">
            <img src="{{ asset('images/icon-instagram.png') }}" alt="Instagram" class="w-6 h-6 hover:opacity-80 transition">
            <img src="{{ asset('images/icon-whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6 hover:opacity-80 transition">
            <img src="{{ asset('images/icon-twitter.png') }}" alt="Twitter" class="w-6 h-6 hover:opacity-80 transition">
        </div>
        <p class="text-sm opacity-90 tracking-wide">
            © 2025 <span class="font-semibold">Geprek GT</span> | All rights reserved.
        </p>
    </footer>

</body>
</html>
