<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Input Obat</h2>
    </section>

    <form action="{{ route('obatAdmin.store') }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf
        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">
            <div>
                <label class="block font-semibold mb-1">Nama Obat</label>
                <input type="text" name="nama_obat" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Dosis</label>
                <input type="text" name="dosis" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Penyakit</label>
                <input type="text" name="penyakit" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">EXP (Bulan/Tahun)</label>
                <input type="text" name="exp" class="w-full border rounded p-2" placeholder="MM/YYYY" required>

                <label class="block font-semibold mt-3 mb-1">Stok</label>
                <input type="number" name="stok" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('obatAdmin.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Tambah</button>
        </div>
    </form>
</x-layout4>
