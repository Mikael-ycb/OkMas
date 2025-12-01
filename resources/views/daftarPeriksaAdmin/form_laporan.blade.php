<x-layout4>
<div class="px-20 py-10 bg-white min-h-screen">

    <h1 class="text-3xl font-extrabold text-blue-900 mb-6">
        Form Laporan Pemeriksaan
    </h1>

    {{-- Informasi Pasien & Pemeriksaan --}}
    <div class="bg-gray-100 border p-6 rounded-lg mb-8">
        <h2 class="text-xl font-bold text-blue-900 mb-4">Informasi Pemeriksaan</h2>

        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="block font-semibold text-gray-700">Nama Pasien</label>
                <input type="text" value="{{ $periksa->nama_pasien }}" disabled 
                    class="w-full border rounded px-3 py-2 bg-gray-200">
            </div>

            <div>
                <label class="block font-semibold text-gray-700">Klaster</label>
                <input type="text" value="{{ $periksa->klaster }}" disabled 
                    class="w-full border rounded px-3 py-2 bg-gray-200">
            </div>

            <div>
                <label class="block font-semibold text-gray-700">Dokter</label>
                <input type="text" value="{{ $periksa->janjiTemu->dokter->nama_dokter ?? '-' }}" disabled 
                    class="w-full border rounded px-3 py-2 bg-gray-200">
            </div>

            <div>
                <label class="block font-semibold text-gray-700">Tanggal Periksa</label>
                <input type="text" value="{{ \Carbon\Carbon::parse($periksa->tanggal_periksa)->format('d/m/Y') }}" disabled 
                    class="w-full border rounded px-3 py-2 bg-gray-200">
            </div>

        </div>
    </div>


   <form action="{{ route('periksa.simpanLaporan', $periksa->id) }}" method="POST">
    @csrf

    {{-- WAJIB DITAMBAHKAN !!! --}}
    <input type="hidden" name="periksa_id" value="{{ $periksa->id }}">
    <input type="hidden" name="id_akun" value="{{ $periksa->janjiTemu->akun->id_akun }}">

    <div class="grid grid-cols-2 gap-6">

        {{-- HASIL PEMERIKSAAN --}}
        <div class="col-span-2">
            <label class="font-semibold text-gray-700">Hasil Pemeriksaan *</label>
            <textarea name="hasil" rows="4" required
                class="w-full border rounded px-3 py-2 mt-1">{{ old('hasil') }}</textarea>
        </div>

        {{-- DIAGNOSA --}}
        <div>
            <label class="font-semibold text-gray-700">Diagnosis</label>
            <textarea name="diagnosa" rows="3"
                class="w-full border rounded px-3 py-2 mt-1">{{ old('diagnosa') }}</textarea>
        </div>

        {{-- TEKANAN DARAH --}}
        <div>
            <label class="font-semibold text-gray-700">Tekanan Darah</label>
            <input type="text" name="tekanan_darah" placeholder="Contoh: 120/80 mmHg"
                value="{{ old('tekanan_darah') }}"
                class="w-full border rounded px-3 py-2 mt-1">
        </div>

        {{-- SARAN DOKTER --}}
        <div class="col-span-2">
            <label class="font-semibold text-gray-700">Saran Dokter</label>
            <textarea name="saran" rows="3"
                class="w-full border rounded px-3 py-2 mt-1">{{ old('saran') }}</textarea>
        </div>

    </div>

    {{-- TOMBOL --}}
    <div class="mt-8 flex justify-end gap-4">
        <a href="{{ route('periksa.index') }}" 
            class="px-6 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
            Batal
        </a>

        <button type="submit" 
            class="px-6 py-2 bg-blue-900 text-white rounded hover:bg-blue-800">
            Simpan Laporan
        </button>
    </div>

</form>


</div>
</x-layout4>
