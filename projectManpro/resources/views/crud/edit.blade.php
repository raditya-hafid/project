<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - Geprek GT</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CropperJS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
</head>

<body class="text-white">

    <section class="relative bg-cover bg-center min-h-screen flex items-center justify-center"
        style="background-image: url('{{ asset('images/bg-hero.webp') }}');">

        <!-- LOGO BESAR DI TENGAH (TIDAK TRANSPARAN) -->
        <div class="absolute inset-0 flex justify-center items-center pointer-events-none">
            <div
                class="bg-center bg-no-repeat"
                style="
                    background-image: url('{{ asset('images/logo.webp') }}');
                    background-size: 800px;
                    width: 800px;
                    height: 800px;
                ">
            </div>
        </div>

        <!-- CARD FORM -->
        <div
            class="relative z-10 bg-[#FFFFFF]/20 backdrop-blur-md text-white p-10 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700">

            <h2 class="text-2xl font-bold drop-shadow-[2px_2px_0_#000] text-center mb-8">Edit Menu</h2>

            <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div>
                    <label for="name" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Nama Menu</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $menu->name) }}"
                        class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none" required>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Kategori Menu</label>
                    <div class="text-gray-900">
                        <select id="id_category" name="id_category"
                            class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none" required>
                            <option value="" disabled>-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('id_category', $menu->id_category) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Deskripsi</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full rounded-lg p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none">{{ old('description', $menu->description) }}</textarea>
                </div>

                <!-- Harga -->
                <div>
                    <label for="price" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Harga</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $menu->price) }}"
                        class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none" required>
                </div>

                <!-- Promo -->
                <div class="flex items-center gap-2">
                    <input type="hidden" name="promo" value="0">
                    <input type="checkbox" id="promo" name="promo" value="1"
                        class="h-5 w-5 text-[#FF7B00] border-gray-300 rounded focus:ring-[#FF7B00]"
                        {{ old('promo', $menu->promo) ? 'checked' : '' }}>
                    <label for="promo" class="font-semibold drop-shadow-[2px_2px_0_#000]">Sedang Promo?</label>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Gambar Menu</label>

                    @if ($menu->gambar)
                        <div class="mb-3">
                            <p class="text-sm mb-1">Gambar Saat Ini:</p>
                            <img src="{{ asset('storage/' . $menu->gambar) }}"
                                class="w-32 h-32 object-cover rounded-lg shadow">
                        </div>
                    @endif

                    <input type="file" id="gambar" accept="image/*"
                        class="w-full text-gray-900 file:rounded-lg file:border-none file:px-3 file:py-2 file:bg-[#FF7B00] file:text-white file:font-medium file:cursor-pointer hover:file:bg-[#e46c00] transition">

                    <input type="hidden" name="cropped_image" id="cropped_image">

                    <div class="mt-3">
                        <img id="preview" class="hidden w-full rounded-lg shadow-lg" alt="Preview Gambar">
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-between mt-8">
                    <a href="{{ route('menu.index') }}"
                        class="bg-[#1E1E3A] hover:bg-[#16162e] text-white font-semibold px-6 py-2 rounded-lg transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-[#FF7B00] hover:bg-[#e46c00] text-white font-semibold px-6 py-2 rounded-lg transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </section>

    <!-- MODAL CROP -->
    <div id="cropModal" class="fixed inset-0 bg-black/70 flex items-center justify-center hidden z-50">
        <div class="bg-white p-5 rounded-xl text-gray-900 w-[90%] max-w-lg">
            <h3 class="text-lg font-semibold mb-3">Potong Gambar</h3>
            <div class="w-full overflow-hidden">
                <img id="cropImage" class="max-h-[400px] w-full object-contain" />
            </div>
            <div class="flex justify-end mt-4 space-x-3">
                <button id="cancelCrop" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Batal</button>
                <button id="confirmCrop" class="px-4 py-2 bg-[#FF7B00] text-white rounded-lg">Simpan</button>
            </div>
        </div>
    </div>

    <script>
        let cropper;
        const input = document.getElementById('gambar');
        const preview = document.getElementById('preview');
        const modal = document.getElementById('cropModal');
        const cropImage = document.getElementById('cropImage');
        const croppedInput = document.getElementById('cropped_image');

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = () => {
                cropImage.src = reader.result;
                modal.classList.remove('hidden');

                if (cropper) cropper.destroy();
                cropper = new Cropper(cropImage, {
                    aspectRatio: 1,
                    viewMode: 1,
                    movable: true,
                    zoomable: true,
                    scalable: false,
                    background: false,
                });
            };
            reader.readAsDataURL(file);
        });

        document.getElementById('cancelCrop').addEventListener('click', () => {
            modal.classList.add('hidden');
            input.value = '';
            if (cropper) cropper.destroy();
        });

        document.getElementById('confirmCrop').addEventListener('click', () => {
            const canvas = cropper.getCroppedCanvas({
                width: 500,
                height: 500,
            });

            canvas.toBlob((blob) => {
                const reader = new FileReader();
                reader.onloadend = () => {
                    croppedInput.value = reader.result;
                    preview.src = reader.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(blob);
            });

            modal.classList.add('hidden');
            cropper.destroy();
        });
    </script>

</body>

</html>
