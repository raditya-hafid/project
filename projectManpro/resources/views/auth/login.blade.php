@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Login</h1>

            <form action="/login" method="post" class="space-y-5">
                @csrf
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF7B00]"
                        placeholder="Masukkan email kamu">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF7B00]"
                        placeholder="Masukkan password kamu">
                </div>

                {{-- Tombol Login --}}
                <button type="submit"
                    class="w-full bg-[#FF7B00] hover:bg-[#e46e00] text-white font-semibold py-2 rounded-lg transition duration-200">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
