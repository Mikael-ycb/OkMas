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
                       value="{{ old('tanggal', $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('Y-m-d') : '') }}"
                       class="w-full border rounded p-2">

                <label class="font-semibold mt-3 mb-1">Klaster Pemeriksaan</label>
                <select name="jenis_pemeriksaan" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Klaster --</option>
                    @php
                        $klaster = \App\Models\Klaster::all();
                    @endphp
                    @foreach($klaster as $k)
                        <option value="{{ $k->nama }}" {{ old('jenis_pemeriksaan', $laporan->jenis_pemeriksaan) == $k->nama ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>

                <label class="font-semibold mt-3 mb-1">Hasil Pemeriksaan</label>
                <textarea name="hasil_pemeriksaan" class="w-full border rounded p-2" rows="4">
                    {{ old('hasil_pemeriksaan', $laporan->hasil_pemeriksaan) }}
                </textarea>
            </div>

            <div>
                @if($laporan->janji_temu_id && $laporan->janjiTemu && $laporan->janjiTemu->dokter)
                    <div class="bg-blue-50 border border-blue-200 p-4 rounded">
                        <p class="text-xs text-gray-500 font-semibold mb-2">Info Pemeriksaan</p>
                        <p class="text-sm mb-2"><strong>Dokter:</strong> {{ $laporan->janjiTemu->dokter->nama_dokter }}</p>
                        <p class="text-sm"><strong>Tanggal Janji:</strong> {{ $laporan->janjiTemu->tanggal->tanggal ?? '-' }}</p>
                    </div>
                @endif
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
