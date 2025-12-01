@extends('layouts.app')
@section('title', 'Login')

@section('content')
<section class="relative bg-cover bg-center min-h-screen flex items-center justify-center"
    style="background-image: url('{{ asset('images/bg-hero.webp') }}');">

    <!-- LOGO -->
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none">
        <div class="bg-center bg-no-repeat"
            style="
                background-image: url('{{ asset('images/logoNew.webp') }}');
                background-size: 700px;
                width: 800px;
                height: 800px;
            ">
        </div>
    </div>

    <div
        class="relative z-10 bg-[#FFFFFF]/20 backdrop-blur-md text-white p-10 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700">

        <h2 class="text-3xl font-bold drop-shadow-[2px_2px_0_#000] text-center mb-8">Login</h2>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full rounded-full p-2 text-gray-900 outline-none ring-2 ring-[#FFFFFF]/50 focus:ring-[#FF7B00] focus:ring-2"
                    placeholder="Masukkan email kamu" required>

                @error('email')
                    <span class="text-red-300 text-sm drop-shadow-[1px_1px_0_#000]">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password"
                    class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full rounded-full p-2 text-gray-900 outline-none ring-2 ring-[#FFFFFF]/50 focus:ring-[#FF7B00] focus:ring-2"
                    placeholder="Masukkan password kamu" required>

                @error('password')
                    <span class="text-red-300 text-sm drop-shadow-[1px_1px_0_#000]">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tombol Login --}}
            <button type="submit"
                class="w-full bg-[#FF7B00] hover:bg-[#e46e00] text-white font-semibold py-2 rounded-full transition duration-200">
                Login
            </button>
        </form>
    </div>

</section>
@endsection
