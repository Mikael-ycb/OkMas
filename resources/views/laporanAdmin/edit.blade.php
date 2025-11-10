<x-layout4>
    <section class="flex flex-col items-start justify-center px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Edit Laporan</h2>
        <p class="text-gray-600 font-medium mt-1">{{ $laporan->nama_pasien }} — NIK: {{ $laporan->nik }}</p>
    </section>

    <form action="{{ route('laporanAdmin.update', $laporan->id) }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">
            <div>
                <label class="block font-semibold mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ optional($laporan->tanggal)->format('Y-m-d') }}"
                       class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Jenis Pemeriksaan</label>
                <input type="text" name="jenis_pemeriksaan" value="{{ $laporan->jenis_pemeriksaan }}"
                       class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Catatan / Hasil</label>
                <textarea name="hasil_pemeriksaan" class="w-full border rounded p-2" rows="4">{{ $laporan->hasil_pemeriksaan }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Anamnesis</label>
                <input type="text" name="anamnesis" value="{{ $laporan->anamnesis }}" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Tekanan Darah</label>
                <input type="text" name="tekanan_darah" value="{{ $laporan->tekanan_darah }}" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Riwayat Penyakit Sekarang</label>
                <textarea name="riwayat_penyakit_sekarang" class="w-full border rounded p-2">{{ $laporan->riwayat_penyakit_sekarang }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border mt-6">
            <div>
                <label class="block font-semibold mb-1">Riwayat Penyakit Dahulu</label>
                <textarea name="riwayat_penyakit_dahulu" class="w-full border rounded p-2">{{ $laporan->riwayat_penyakit_dahulu }}</textarea>

                <label class="block font-semibold mt-3 mb-1">Riwayat Penyakit Keluarga</label>
                <textarea name="riwayat_penyakit_keluarga" class="w-full border rounded p-2">{{ $laporan->riwayat_penyakit_keluarga }}</textarea>
            </div>
            <div>
                <label class="block font-semibold mb-1">Riwayat Kebiasaan Harian</label>
                <textarea name="riwayat_kebiasaan" class="w-full border rounded p-2">{{ $laporan->riwayat_kebiasaan }}</textarea>

                <label class="block font-semibold mt-3 mb-1">Anamnesis Organ</label>
                <textarea name="anamnesis_organ" class="w-full border rounded p-2">{{ $laporan->anamnesis_organ }}</textarea>
            </div>
        </div>

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('laporanAdmin.show', $laporan->nik) }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Update</button>
        </div>
    </form>
</x-layout4>
