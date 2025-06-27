<x-layouts.app title="Tambah Berita">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 transition-colors duration-200 
                    max-h-screen overflow-y-auto border border-gray-200 dark:border-gray-700">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-900 dark:text-white">
                    {{-- JUDUL --}}
                    <div class="md:col-span-2">
                        <label for="title" class="block mb-2">Judul <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title"
                            value="{{ old('title') }}"
                            placeholder="Masukkan judul berita..."
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                            focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 @error('title') border-red-500 dark:border-red-400 @enderror">
                        @error('title')
                            <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- KATEGORI --}}
                    <div>
                        <label for="category_id" class="block mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category_id" id="category_id"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PENULIS --}}
                    <div>
                        <label for="author" class="block mb-2">Penulis <span class="text-red-500">*</span></label>
                        <input type="text" name="author" id="author"
                            value="{{ old('author', 'Admin') }}"
                            placeholder="Nama penulis..."
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                            focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 @error('author') border-red-500 dark:border-red-400 @enderror">
                        @error('author')
                            <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- GAMBAR --}}
                    <div class="md:col-span-2">
                        <label for="image" class="block mb-2">Gambar</label>
                        <div class="relative">
                            <input type="file" name="image" id="image"
                                class="block w-full text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer
                                       focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                       file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100
                                       dark:file:bg-blue-900/20 dark:file:text-blue-400 dark:hover:file:bg-blue-900/30
                                       py-2 px-3">
                        </div>
                        <p id="filename" class="mt-2 text-sm text-gray-600 dark:text-gray-300"></p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Format: JPG, PNG, GIF. Max 2MB</p>
                        @error('image')
                            <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- RINGKASAN --}}
                    <div class="md:col-span-2">
                        <label for="excerpt" class="block mb-2">Ringkasan</label>
                        <textarea name="excerpt" id="excerpt" rows="3"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                            resize-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 @error('excerpt') border-red-500 dark:border-red-400 @enderror">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- KONTEN --}}
                    <div class="md:col-span-2">
                        <label for="content" class="block mb-2">Konten <span class="text-red-500">*</span></label>
                        <textarea name="content" id="content" rows="10"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                            resize-y focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 @error('content') border-red-500 dark:border-red-400 @enderror">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-500 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PUBLISH --}}
                    <div class="md:col-span-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
                                class="h-5 w-5 rounded border-gray-300 dark:border-gray-600 text-blue-600 dark:bg-gray-700 focus:ring-blue-500 dark:focus:ring-blue-400">
                            <span class="ml-2 text-sm text-gray-900 dark:text-white">Publikasikan sekarang</span>
                        </label>
                    </div>
                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('admin.news.index') }}"
                        class="px-4 py-2 rounded border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Tampilkan nama file saat dipilih
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('filename').textContent = `Dipilih: ${file.name}`;
            } else {
                document.getElementById('filename').textContent = '';
            }
        });
    </script>
</x-layouts.app>
