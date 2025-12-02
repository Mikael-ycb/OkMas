<x-layout4>
    <div class="mb-8">
        <a href="{{ route('klaster.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 font-semibold group">
            <span class="group-hover:-translate-x-1 transition-transform">←</span>
            <span class="ml-2">Kembali ke Daftar Klaster</span>
        </a>
        <h2 class="text-4xl font-bold text-blue-900">✏️ Edit Klaster</h2>
        <p class="text-gray-600 mt-2">Update informasi klaster kesehatan</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Form --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-8 border-t-4 border-orange-500">
                <form action="{{ route('klaster.update', $klaster->id) }}" method="POST">
                    @csrf
                    @method('POST')

                    {{-- Nama Klaster --}}
                    <div class="mb-6">
                        <label class="block font-semibold text-gray-700 mb-3">
                            <span class="text-red-500">*</span> Nama Klaster
                        </label>
                        <input type="text" name="nama" placeholder="Nama klaster..."
                               class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-orange-500 focus:outline-none transition @error('nama') border-red-500 @enderror"
                               value="{{ old('nama', $klaster->nama) }}" required>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jenis Klaster --}}
                    <div class="mb-6">
                        <label class="block font-semibold text-gray-700 mb-3">Jenis Klaster</label>
                        <select name="jenis" 
                                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-orange-500 focus:outline-none transition @error('jenis') border-red-500 @enderror">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Bidan" {{ old('jenis', $klaster->jenis) == 'Bidan' ? 'selected' : '' }}>👩‍⚕️ Bidan</option>
                            <option value="Umum" {{ old('jenis', $klaster->jenis) == 'Umum' ? 'selected' : '' }}>🏥 Umum</option>
                            <option value="Gigi" {{ old('jenis', $klaster->jenis) == 'Gigi' ? 'selected' : '' }}>😁 Gigi & Mulut</option>
                            <option value="Spesialis" {{ old('jenis', $klaster->jenis) == 'Spesialis' ? 'selected' : '' }}>🩺 Spesialis</option>
                            <option value="Lainnya" {{ old('jenis', $klaster->jenis) == 'Lainnya' ? 'selected' : '' }}>❓ Lainnya</option>
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
                                  class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-orange-500 focus:outline-none transition @error('deskripsi') border-red-500 @enderror"
                                  required>{{ old('deskripsi', $klaster->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-4">
                        <button type="submit" class="flex-1 bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold transition shadow-md hover:shadow-lg">
                            💾 Update Klaster
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
            <div class="bg-orange-50 rounded-xl p-6 border-l-4 border-orange-500 sticky top-6">
                <h3 class="text-lg font-bold text-orange-900 mb-4">📋 Informasi Klaster</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <p class="font-semibold text-gray-700">ID</p>
                        <p class="text-gray-600">#{{ $klaster->id }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Total Dokter</p>
                        <p class="text-2xl font-bold text-orange-600">{{ $klaster->dokters->count() }}</p>
                    </div>
                    <div class="pt-4 border-t border-orange-200">
                        <p class="font-semibold text-gray-700 mb-2">Dokter di Klaster Ini:</p>
                        @if($klaster->dokters->isEmpty())
                            <p class="text-yellow-700 text-xs bg-yellow-50 p-2 rounded">⚠️ Belum ada dokter</p>
                        @else
                            <ul class="space-y-1 text-xs">
                                @foreach($klaster->dokters as $dokter)
                                    <li class="text-gray-700">• {{ $dokter->nama_dokter }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="pt-4 border-t border-orange-200">
                        <p class="font-semibold text-gray-700 mb-2">Dibuat</p>
                        <p class="text-gray-600 text-xs">{{ $klaster->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout4>

