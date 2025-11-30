<x-layout4>
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold text-blue-900 mb-4">Buat Resep Obat</h2>

    <form action="{{ route('resep.store') }}" method="POST">
        @csrf

        <label class="font-semibold">Pilih Pasien</label>
        <select name="id_pasien" class="w-full p-3 border rounded mb-4">
            @foreach ($pasien as $p)
                <option value="{{ $p->id_akun }}">{{ $p->nama }}</option>
            @endforeach
        </select>

        <label class="font-semibold">Pilih Obat</label>
        <select name="id_obat" class="w-full p-3 border rounded mb-4">
            @foreach ($obat as $o)
                <option value="{{ $o->id }}">{{ $o->nama_obat }} (stok: {{ $o->stok }})</option>
            @endforeach
        </select>

        <label class="font-semibold">Jumlah</label>
        <input type="number" name="jumlah" class="w-full p-3 border rounded mb-4">

        <label class="font-semibold">Aturan Pakai</label>
        <input type="text" name="aturan_pakai" class="w-full p-3 border rounded mb-4" placeholder="contoh: 3x sehari">

        <button class="w-full py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
            Simpan Resep
        </button>
    </form>

</div>
</x-layout4>
