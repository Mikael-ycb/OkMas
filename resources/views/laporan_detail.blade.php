<x-layout>

    <section class="px-10 py-10">
        <a href="{{ route('laporan') }}"
           class="text-blue-600 hover:underline mb-5 inline-block">← Kembali</a>

        <h1 class="text-3xl font-bold text-blue-900 mb-6">Detail Laporan Pemeriksaan</h1>

        <div class="bg-white shadow p-6 rounded-lg border border-gray-200">

            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-sm text-gray-600">Nama Pasien</p>
                    <p class="font-semibold">{{ $laporan->nama_pasien }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">NIK</p>
                    <p class="font-semibold">{{ $laporan->nik }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Tanggal</p>
                    <p class="font-semibold">
                        {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Jenis Pemeriksaan</p>
                    <p class="font-semibold">{{ $laporan->jenis_pemeriksaan }}</p>
                </div>
            </div>

            <hr class="my-4">

            <h2 class="text-xl font-bold text-blue-900 mb-3">Hasil Pemeriksaan</h2>
            <p class="mb-4">{{ $laporan->hasil_pemeriksaan ?? '-' }}</p>

            <h2 class="text-xl font-bold text-blue-900 mb-3">Anamnesis</h2>
            <p class="mb-4">{{ $laporan->anamnesis ?? '-' }}</p>

            <h2 class="text-xl font-bold text-blue-900 mb-3">Tekanan Darah</h2>
            <p class="mb-4">{{ $laporan->tekanan_darah ?? '-' }}</p>

            <h2 class="text-xl font-bold text-blue-900 mb-3">Diagnosa</h2>
            <p class="mb-4">{{ $laporan->riwayat_penyakit_sekarang ?? '-' }}</p>

            <h2 class="text-xl font-bold text-blue-900 mb-3">Saran</h2>
            <p>{{ $laporan->riwayat_kebiasaan ?? '-' }}</p>

            <!-- <div class="mt-6">
                <a href="{{ route('laporan_pdf', $laporan->id) }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    ⬇️ Download PDF
                </a>
            </div> -->

        </div>
    </section>

</x-layout>
