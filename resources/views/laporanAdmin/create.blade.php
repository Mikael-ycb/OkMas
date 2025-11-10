<x-layout4>
    <section class="flex flex-col items-start justify-center px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Tambah Laporan</h2>
    </section>

    <form action="{{ route('laporanAdmin.store') }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf
        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">
            <div>
                <label class="block font-semibold mb-1">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">NIK</label>
                <input type="text" name="nik" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Jenis Pemeriksaan</label>
                <input type="text" name="jenis_pemeriksaan" class="w-full border rounded p-2" placeholder="Contoh: Pemeriksaan Umum / Gigi / Bidan" required>

                <label class="block font-semibold mt-3 mb-1">Catatan / Hasil</label>
                <textarea name="hasil_pemeriksaan" class="w-full border rounded p-2" rows="4" placeholder="Isi hasil pemeriksaan di sini"></textarea>
            </div>
        </div>

        {{-- Optional form lanjutan / kolom klinis --}}
        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border mt-6">
            <div>
                <label class="block font-semibold mb-1">Anamnesis</label>
                <input type="text" name="anamnesis" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Tekanan Darah</label>
                <input type="text" name="tekanan_darah" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block font-semibold mb-1">Riwayat Penyakit Sekarang</label>
                <textarea name="riwayat_penyakit_sekarang" class="w-full border rounded p-2"></textarea>

                <label class="block font-semibold mt-3 mb-1">Riwayat Penyakit Dahulu</label>
                <textarea name="riwayat_penyakit_dahulu" class="w-full border rounded p-2"></textarea>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border mt-6">
            <div>
                <label class="block font-semibold mb-1">Riwayat Penyakit Keluarga</label>
                <textarea name="riwayat_penyakit_keluarga" class="w-full border rounded p-2"></textarea>
            </div>
            <div>
                <label class="block font-semibold mb-1">Riwayat Kebiasaan Harian</label>
                <textarea name="riwayat_kebiasaan" class="w-full border rounded p-2"></textarea>

                <label class="block font-semibold mt-3 mb-1">Anamnesis Organ</label>
                <textarea name="anamnesis_organ" class="w-full border rounded p-2"></textarea>
            </div>
        </div>

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('laporanAdmin.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Simpan</button>
        </div>
    </form>
</x-layout4>
