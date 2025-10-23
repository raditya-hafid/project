<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
</head>

<body class="bg-[#45000F]">

    <div id="navbar" class="fixed top-0 left-0 w-full z-50 bg-[#FF7B00] shadow-md transition-transform duration-300">
        <div class="container mx-auto flex justify-between items-center p-2 px-4 md:px-15">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="" class="h-15 w-auto">
            </a>
            <nav>
                <a href="#" class="text-white mx-2 hover:text-gray-200 transition">Home</a>
                <a href="#" class="text-white mx-2 hover:text-gray-200 transition">Menu</a>
                <a href="#" class="text-white mx-2 hover:text-gray-200 transition">About</a>
                <a href="#" class="text-white mx-2 hover:text-gray-200 transition">Outlet</a>
            </nav>
        </div>
    </div>

    <div class="bg-cover bg-center h-150" style="background-image: url('{{ asset('images/Rectangle.png') }}')">

        <div class="container mx-auto h-full flex items-center px-4 md:px-10">

            <div class="p-0 w-full pl-20">
                <h2 class="text-5xl font-bold text-[#FC8B26] leading-tight tracking-wider"
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(2.5rem, 5vw, 5rem); padding-left: 40px; text-shadow: 2px 5px 4px rgba(0,0,0,0.5);">
                    SENSASI PEDAS
                </h2>
                <h1 class="text-8xl font-bold text-[#FC8B26] leading-tight tracking-wider -mt-10"
                    style="font-family: 'Luckiest Guy', cursive; font-size: clamp(5rem, 10vw, 10rem); padding-left: 45px; text-shadow: 2px 5px 4px rgba(0,0,0,0.5); ">
                    JUARA
                </h1>
                <p class="mt-4 pl-10 text-white text-lg leading-relaxed"
                    style="font-family: 'Montserrat', sans-serif; font-size: clamp(0.8rem, 1.5vw, 1.5rem);">
                    Dibuat dari ayam segar pilihan dan sambal dadak <br>
                    yang diracik setiap hari. Rasakan bedanya!
                </p>
            </div>
        </div>
    </div>

    <div class="container md:px-15">
        <div class="mt-8">
            <h3 class="text-2xl font-bold text-[#FF7B00]">HOT PROMO</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
                @forelse ($menus as $menu)
                    @if ($menu->promo == 1)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="w-full h-48 bg-gray-100"></div>
                            <div class="p-4">
                                <h4 class="font-bold text-lg">{{ $menu->name }}</h4>
                                <p class="text-gray-600">Rp{{ number_format($menu->price, 2) }}</p>
                                <div class="flex items-center mt-2">
                                    <span class="text-yellow-400">★★★★☆</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <p class="text-white">Belum ada promo.</p>
                @endforelse
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-2xl font-bold text-[#FF7B00]">ALL MENU</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
                @forelse ($menus as $menu)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="w-full h-48 bg-gray-300"></div>
                        <div class="p-4">
                            <h4 class="font-bold text-lg">{{ $menu->name }}</h4>
                            <p class="text-gray-600">Rp{{ number_format($menu->price, 2) }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-yellow-400">★★★★☆</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-white">Belum ada menu yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>





<script>
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Scroll ke bawah → sembunyikan navbar
            navbar.style.transform = 'translateY(-100%)';
        } else {
            // Scroll ke atas → tampilkan navbar
            navbar.style.transform = 'translateY(0)';
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Hindari nilai negatif
    });
</script>
</body>

</html>
