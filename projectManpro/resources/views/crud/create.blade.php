<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu - Geprek GT</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tambahkan Cropper.js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
</head>

<body>

    <section class="relative bg-cover bg-center min-h-screen flex items-center justify-center"
        style="background-image: url('{{ asset('images/bg-hero.webp') }}');">

        <!-- LOGO BARU -->
        <div class="absolute inset-0 flex justify-center items-center pointer-events-none">
            <div class="bg-center bg-no-repeat"
                style="
            background-image: url('{{ asset('images/logo.webp') }}');
            background-size: 800px;
            width: 800px;
            height: 800px;
        ">
            </div>
        </div>

        <div
            class="relative z-10 bg-[#FFFFFF]/20 backdrop-blur-md text-white p-10 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700">

            <h2 class="text-2xl font-bold drop-shadow-[2px_2px_0_#000] text-center mb-8">Tambah Menu Baru</h2>

            <!-- Form -->
            <form id="menuForm" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Nama
                        Menu</label>
                    <input type="text" id="name" name="name"
                        class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none"
                        required>
                </div>

                <div>
                    <label for="category_id" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Kategori
                        Menu</label>

                    <div class="text-gray-900">
                        <select id="id_category" name="id_category"
                            class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none"
                            required>

                            <option value="" disabled selected>-- Pilih Kategori --</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="text-gray-900"
                                    {{ old('id_category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_category')
                        <span class="text-red-300 text-sm drop-shadow-[1px_1px_0_#000]">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="description"
                        class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Deskripsi</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full rounded-lg p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none"></textarea>
                </div>

                <div>
                    <label for="price" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Harga</label>
                    <input type="number" id="price" name="price"
                        class="w-full rounded-full p-2 text-gray-900 focus:ring-2 focus:ring-[#FF7B00] outline-none"
                        required>
                </div>

                <div class="flex items-center gap-2">
                    <input type="hidden" name="promo" value="0">
                    <input type="checkbox" id="promo" name="promo" value="1"
                        class="h-5 w-5 text-[#FF7B00] border-gray-300 rounded focus:ring-[#FF7B00]"
                        {{ old('promo') ? 'checked' : '' }}>
                    <label for="promo" class="font-semibold drop-shadow-[2px_2px_0_#000]">Sedang Promo?</label>
                </div>

                <!-- Gambar dengan Cropper -->
                <div>
                    <label for="gambar" class="block font-semibold drop-shadow-[2px_2px_0_#000] mb-1">Gambar
                        Menu</label>
                    <input type="file" id="gambar" accept="image/*"
                        class="w-full text-gray-900 file:rounded-lg file:border-none file:px-3 file:py-2 file:bg-[#FF7B00] file:text-white file:font-medium file:cursor-pointer hover:file:bg-[#e46c00] transition">
                    <input type="hidden" name="gambar" id="croppedImageInput">

                    <!-- Preview -->
                    <div class="mt-3">
                        <img id="preview" class="hidden w-full rounded-lg shadow-lg" alt="Preview Gambar">
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    <a href="/menu"
                        class="bg-[#1E1E3A] hover:bg-[#16162e] text-white font-semibold px-6 py-2 rounded-lg transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-[#FF7B00] hover:bg-[#e46c00] text-white font-semibold px-6 py-2 rounded-lg transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Modal Crop -->
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
        const croppedInput = document.getElementById('croppedImageInput');

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = () => {
                cropImage.src = reader.result;
                modal.classList.remove('hidden');

                if (cropper) cropper.destroy();
                cropper = new Cropper(cropImage, {
                    aspectRatio: 7 / 5, // RASIO PERSEGI PANJANG
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
                width: 700,
                height: 500, // cocok hasil ratio 7:5
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
