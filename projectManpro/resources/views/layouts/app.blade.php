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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

</head>

<body class="flex flex-col min-h-screen m-0 p-0">

    {{-- ===== Navbar Responsif ===== --}}
    <div id="navbar" class="fixed top-0 left-0 w-full z-50 bg-[#FF7B00] shadow-md transition-transform duration-300">
        <div class="container mx-auto flex justify-between items-center p-3 px-4 md:px-10">

            <!-- LOGO -->
            <a href="/">
                <img src="{{ asset('images/logo.webp') }}" alt="Geprek GT" class="h-14 w-auto">
            </a>

            <!-- HAMBURGER BUTTON (MOBILE) -->
            <button id="mobileMenuBtn" class="md:hidden text-white text-3xl focus:outline-none">
                ☰
            </button>

            <!-- MENU DESKTOP -->
            <nav class="hidden md:flex gap-4 text-white font-medium">
                @auth
                    <form action="/logout" method="post" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-[#45000F] transition">Logout</button>
                    </form>
                    <a href="/menu" class="hover:text-[#45000F] transition">Dashboard</a>
                @endauth

                <a href="/" class="hover:text-[#45000F] transition">Home</a>
                <a href="{{ route('products.index') }}" class="hover:text-[#45000F] transition">Menu</a>
                <a href="{{ route('about.index') }}" class="hover:text-[#45000F] transition">About</a>
                <a href="{{ route('outlet.index') }}" class="hover:text-[#45000F] transition">Outlet</a>
            </nav>
        </div>

        <!-- MENU MOBILE (DROPDOWN) -->
        <div id="mobileMenu"
            class="hidden flex flex-col bg-[#FF7B00] text-white text-lg font-medium p-4 space-y-3 shadow-md md:hidden">

            @auth
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="hover:text-[#45000F] transition w-full text-left">Logout</button>
                </form>

                <a href="/menu" class="hover:text-[#45000F] transition">Dashboard</a>
            @endauth

            <a href="/" class="hover:text-[#45000F] transition">Home</a>
            <a href="{{ route('products.index') }}" class="hover:text-[#45000F] transition">Menu</a>
            <a href="{{ route('about.index') }}" class="hover:text-[#45000F] transition">About</a>
            <a href="{{ route('outlet.index') }}" class="hover:text-[#45000F] transition">Outlet</a>
        </div>
    </div>



    {{-- ===== Main Content ===== --}}
    <main class="relative bg-fixed bg-cover bg-center min-h-screen"
        style="background-image: url('{{ asset('images/bg-hero.webp') }}');">
        @yield('content')
    </main>



    {{-- ===== Footer ===== --}}
    <footer class="bg-[#5C0000] text-white text-center py-10 bg-cover bg-center relative m-0"
        style="background-image: url('{{ asset('images/bg-hero.webp') }}');">
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
                <a href="#"><img src="{{ asset('images/icon-instagram.png') }}"
                        class="w-6 h-6 hover:opacity-80 transition"></a>
                <a href="#"><img src="{{ asset('images/icon-facebook.png') }}"
                        class="w-6 h-6 hover:opacity-80 transition"></a>
                <a href="#"><img src="{{ asset('images/icon-twitter.png') }}"
                        class="w-6 h-6 hover:opacity-80 transition"></a>
                <a href="#"><img src="{{ asset('images/icon-whatsapp.png') }}"
                        class="w-6 h-6 hover:opacity-80 transition"></a>
            </div>

            <div class="text-xs md:text-sm text-white/90 mb-3">
                Sitemap | Privacy | Terms | Copyright © 2025 <span class="font-semibold">Geprek GT</span>
            </div>

            <div class="flex justify-center gap-8 font-medium text-sm md:text-base">
                <a href="/" class="hover:underline">Home</a>
                <a href="{{ route('about.index') }}" class="hover:underline">About</a>
                <a href="{{ route('outlet.index') }}" class="hover:underline">Outlet</a>
                <a href="{{ route('products.index') }}" class="hover:underline">Menu</a>
            </div>

        </div>
    </footer>



    {{-- ===== Script Navbar & Mobile Menu ===== --}}
    <script>
        // Hide navbar on scroll down, show on scroll up
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        });


        // Mobile menu toggle
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
