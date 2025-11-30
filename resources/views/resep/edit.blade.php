<x-layout4>
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold text-blue-900 mb-6">Edit Resep Obat</h2>

    <form action="{{ route('resep.update', $resep->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- PASIEN -->
        <label class="font-semibold">Pilih Pasien</label>
        <select name="id_pasien" class="w-full p-3 border rounded mb-4">
            @foreach ($pasien as $p)
                <option value="{{ $p->id_akun }}" 
                        {{ $resep->id_pasien == $p->id_akun ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>

        <!-- OBAT -->
        <label class="font-semibold">Pilih Obat</label>
        <select name="id_obat" class="w-full p-3 border rounded mb-4">
            @foreach ($obat as $o)
                <option value="{{ $o->id }}" 
                        {{ $resep->id_obat == $o->id ? 'selected' : '' }}>
                    {{ $o->nama_obat }} (stok: {{ $o->stok }})
                </option>
            @endforeach
        </select>

        <!-- JUMLAH -->
        <label class="font-semibold">Jumlah</label>
        <input type="number" name="jumlah" 
               value="{{ $resep->jumlah }}"
               class="w-full p-3 border rounded mb-4">

        <!-- ATURAN PAKAI -->
        <label class="font-semibold">Aturan Pakai</label>
        <input type="text" name="aturan_pakai"
               value="{{ $resep->aturan_pakai }}"
               class="w-full p-3 border rounded mb-4"
               placeholder="Contoh: 3x sehari">

        <!-- BUTTON -->
        <div class="flex gap-4 mt-6">
            <button class="w-full py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                Simpan Perubahan
            </button>

            <a href="{{ route('resep.index') }}"
               class="w-full py-3 text-center bg-gray-300 rounded-xl hover:bg-gray-400">
                Batal
            </a>
        </div>

    </form>

</div>
</x-layout4>
