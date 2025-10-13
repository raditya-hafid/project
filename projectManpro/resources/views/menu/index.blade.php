<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#2A0103]">
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center pb-4 border-b border-gray-500">
            <h1 class="text-3xl font-bold text-white">GEPREK CT</h1>
            <nav>
                <a href="#" class="text-white mx-2">Menu</a>
                <a href="#" class="text-white mx-2">About</a>
                <a href="#" class="text-white mx-2">Outlet</a>
            </nav>
        </div>

        <div class="flex items-center justify-between mt-8 bg-cover bg-center h-64 text-white rounded-lg" style="background-image: url('https://placeholder.com/1200x400')">
            <div class="p-8">
                <h2 class="text-4xl font-bold">SENSASI PEDAS JUARA</h2>
                <p class="mt-2">Dibuat dari ayam segar pilihan dan sambal dadak <br> yang diracik setiap hari. Rasakan bedanya!</p>
            </div>
            <div>
                 </div>
        </div>

        <div class="mt-8">
            <h3 class="text-2xl font-bold text-orange-500">HOT PROMO</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
                @forelse ($menus as $menu)
                    @if ($menu->promo == 1)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="w-full h-48 bg-gray-300"></div> <div class="p-4">
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
            <h3 class="text-2xl font-bold text-orange-500">ALL MENU</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
                @forelse ($menus as $menu)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="w-full h-48 bg-gray-300"></div> <div class="p-4">
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
</body>

</html>
