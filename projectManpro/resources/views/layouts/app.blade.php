<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Geprek GT')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 bg-cream">
    {{-- Navbar --}}
    <header class="bg-primary text-white sticky top-0 z-50 shadow">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10">
                <span class="text-xl font-bold">Geprek GT</span>
            </div>
            <nav class="hidden md:flex gap-6">
                <a href="/" class="hover:underline">Home</a>
                <a href="#menu" class="hover:underline">Menu</a>
                <a href="#about" class="hover:underline">About</a>
                <a href="#outlet" class="hover:underline">Outlet</a>
            </nav>
        </div>
    </header>

    {{-- Main content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-darkred text-white text-center py-6 mt-10">
        <div class="flex justify-center gap-4 mb-3">
            <img src="{{ asset('images/icon-facebook.png') }}" alt="Facebook" class="w-6 h-6">
            <img src="{{ asset('images/icon-instagram.png') }}" alt="Instagram" class="w-6 h-6">
            <img src="{{ asset('images/icon-whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6">
            <img src="{{ asset('images/icon-twitter.png') }}" alt="Twitter" class="w-6 h-6">
        </div>
        <p class="text-sm">© 2025 Geprek GT | All rights reserved.</p>
    </footer>
</body>
</html>
