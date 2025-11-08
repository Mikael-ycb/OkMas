<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Laporan</h2>
        <p class="text-gray-600 font-medium mt-1">{{ $laporan->nama_pasien }}</p>
    </section>

    <form action="{{ route('laporanAdmin.update', $laporan->id) }}" method="POST"
          class="px-20 pb-20 bg-white min-h-screen">
        @csrf
        <div class="grid grid-cols-2 gap-10 bg-white p-10 rounded-xl shadow-md border border-gray-200">
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Anamnesis</label>
                <input type="text" name="anamnesis" value="{{ $laporan->anamnesis }}" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500">

                <label class="block font-semibold mt-4 mb-1 text-gray-700">Tekanan Darah</label>
                <input type="text" name="tekanan_darah" value="{{ $laporan->tekanan_darah }}" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500">

                <label class="block font-semibold mt-4 mb-1 text-gray-700">Riwayat Penyakit Sekarang</label>
                <textarea name="riwayat_penyakit_sekarang" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500">{{ $laporan->riwayat_penyakit_sekarang }}</textarea>

                <label class="block font-semibold mt-4 mb-1 text-gray-700">Riwayat Penyakit Dahulu</label>
                <textarea name="riwayat_penyakit_dahulu" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500">{{ $laporan->riwayat_penyakit_dahulu }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Riwayat Penyakit Keluarga</label>
                <textarea name="riwayat_penyakit_keluarga" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500">{{ $laporan->riwayat_penyakit_keluarga }}</textarea>

                <label class="block font-semibold mt-4 mb-1 text-gray-700">Riwayat Kebiasaan Sehari-hari</label>
                <textarea name="riwayat_kebiasaan" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500">{{ $laporan->riwayat_kebiasaan }}</textarea>

                <label class="block font-semibold mt-4 mb-1 text-gray-700">Anamnesis Organ</label>
                <textarea name="anamnesis_organ" class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-500">{{ $laporan->anamnesis_organ }}</textarea>
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ url()->previous() }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Update</button>
        </div>
    </form>
</x-layout4>
