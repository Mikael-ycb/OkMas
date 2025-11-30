<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">Edit Rekam Medis</h1>
        <p class="text-gray-600 mt-1">{{ $laporan->akun->nama }} — NIK: {{ $laporan->akun->nik }}</p>
    </section>

    <form action="{{ route('laporanAdmin.update', $laporan->id) }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf @method('PUT')

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">

            <div>
                <label class="font-semibold mb-1">Tanggal</label>
                <input type="date" name="tanggal"
                       value="{{ optional($laporan->tanggal)->format('Y-m-d') }}"
                       class="w-full border rounded p-2">

                <label class="font-semibold mt-3 mb-1">Jenis Pemeriksaan</label>
                <input type="text" class="w-full border rounded p-2"
                       name="jenis_pemeriksaan" value="{{ $laporan->jenis_pemeriksaan }}" required>

                <label class="font-semibold mt-3 mb-1">Hasil Pemeriksaan</label>
                <textarea name="hasil_pemeriksaan" class="w-full border rounded p-2" rows="4">
                    {{ $laporan->hasil_pemeriksaan }}
                </textarea>
            </div>
        </div>

        @include('laporanAdmin.partials.form-klinis')

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('laporanAdmin.show', $laporan->id_akun) }}"
               class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">Batal</a>

            <button class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">
                Update
            </button>
        </div>
    </form>
</x-layout4>
