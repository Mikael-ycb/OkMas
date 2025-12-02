<x-layout4>
    <div class="mb-8">
        <a href="{{ route('klaster.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 font-semibold group">
            <span class="group-hover:-translate-x-1 transition-transform">←</span>
            <span class="ml-2">Kembali ke Daftar Klaster</span>
        </a>
        <h2 class="text-4xl font-bold text-blue-900">➕ Tambah Klaster Kesehatan Baru</h2>
        <p class="text-gray-600 mt-2">Tambahkan unit layanan kesehatan baru ke dalam sistem</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Form --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8 border-t-4 border-blue-500">
                <form action="{{ route('klaster.store') }}" method="POST">
                    @csrf

                    {{-- Nama Klaster --}}
                    <div class="mb-6">
                        <label class="block font-semibold text-gray-700 mb-3">
                            <span class="text-red-500">*</span> Nama Klaster
                        </label>
                        <input type="text" name="nama" placeholder="Contoh: Klaster Bidan, Klaster Gigi"
                               class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition @error('nama') border-red-500 @enderror"
                               value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Klaster --}}
                    <div class="mb-6">
                        <label class="block font-semibold text-gray-700 mb-3">Jenis Klaster</label>
                        <select name="jenis" 
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition @error('jenis') border-red-500 @enderror">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Bidan" {{ old('jenis') == 'Bidan' ? 'selected' : '' }}>👩‍⚕️ Bidan</option>
                            <option value="Umum" {{ old('jenis') == 'Umum' ? 'selected' : '' }}>🏥 Umum</option>
                            <option value="Gigi" {{ old('jenis') == 'Gigi' ? 'selected' : '' }}>😁 Gigi & Mulut</option>
                            <option value="Spesialis" {{ old('jenis') == 'Spesialis' ? 'selected' : '' }}>🩺 Spesialis</option>
                            <option value="Lainnya" {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>❓ Lainnya</option>
                        </select>
                        @error('jenis')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-6">
                        <label class="block font-semibold text-gray-700 mb-3">
                            <span class="text-red-500">*</span> Deskripsi Klaster
                        </label>
                        <textarea name="deskripsi" placeholder="Jelaskan fungsi, layanan, dan spesialisasi klaster ini..." rows="8"
                                  class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-blue-500 focus:outline-none transition @error('deskripsi') border-red-500 @enderror"
                                  required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-4">
                        <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition shadow-md hover:shadow-lg">
                            💾 Simpan Klaster
                        </button>
                        <a href="{{ route('klaster.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition text-center">
                            ❌ Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Info Card --}}
        <div>
            <div class="bg-blue-50 rounded-xl p-6 border-l-4 border-blue-500 sticky top-6">
                <h3 class="text-lg font-bold text-blue-900 mb-4">📋 Tips Mengisi</h3>
                <div class="space-y-4 text-sm text-gray-700">
                    <div>
                        <p class="font-semibold text-blue-900 mb-1">Nama Klaster</p>
                        <p>Gunakan nama yang jelas dan mudah diingat, misalnya "Klaster Kesehatan Ibu & Anak"</p>
                    </div>
                    <div>
                        <p class="font-semibold text-blue-900 mb-1">Jenis Klaster</p>
                        <p>Pilih kategori yang sesuai dengan spesialisasi medis klaster</p>
                    </div>
                    <div>
                        <p class="font-semibold text-blue-900 mb-1">Deskripsi</p>
                        <p>Jelaskan jenis layanan, dokter spesialis, dan peralatan yang tersedia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout4>

