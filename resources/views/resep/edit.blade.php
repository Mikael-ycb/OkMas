<x-layout4>
    <section class="px-20 pt-12 pb-6">
        <h1 class="text-3xl font-extrabold text-blue-900">Buat Resep Obat</h1>
    </section>

    <form action="{{ route('resep.store') }}" method="POST" class="px-20">
        @csrf

        {{-- PILIH LAPORAN --}}
        <label class="block font-semibold mt-4">Pilih Laporan Pemeriksaan</label>
        <select name="laporan_id" class="border rounded px-3 py-2 w-full" required>
            <option value="">-- Pilih Laporan --</option>
            @foreach($laporan as $l)
                <option value="{{ $l->id }}">
                    {{ $l->akun->nama }} — {{ $l->jenis_pemeriksaan }} ({{ $l->tanggal->format('d/m/Y') }})
                </option>
            @endforeach
        </select>

        {{-- PILIH PASIEN --}}
        <label class="block font-semibold mt-4">Pilih Pasien</label>
        <select name="id_akun" class="border rounded px-3 py-2 w-full" required>
            @foreach($akun as $a)
                <option value="{{ $a->id_akun }}">{{ $a->nama }} — {{ $a->nik }}</option>
            @endforeach
        </select>

        {{-- INPUT DOKTER --}}
        <label class="block font-semibold mt-4">Dokter</label>
        <input type="text" name="dokter" class="w-full border rounded px-3 py-2" required>

        {{-- TANGGAL --}}
        <label class="block font-semibold mt-4">Tanggal</label>
        <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" required>

        {{-- DETAIL OBAT --}}
        <div id="obat-container" class="mt-6">
            <div class="grid grid-cols-3 gap-4 border p-4 rounded mb-4">

                <select name="obat_id[]" class="border rounded px-2 py-1">
                    @foreach($obat as $o)
                        <option value="{{ $o->id }}">{{ $o->nama_obat }} (Stok: {{ $o->stok }})</option>
                    @endforeach
                </select>

                <input type="number" name="jumlah[]" placeholder="Jumlah"
                    class="border rounded px-2 py-1" required>

                <input type="text" name="aturan_pakai[]" placeholder="Aturan pakai"
                    class="border rounded px-2 py-1">
            </div>
        </div>

        <button type="submit" class="mt-6 bg-blue-900 text-white px-6 py-2 rounded">
            Simpan Resep
        </button>
    </form>
</x-layout4>
