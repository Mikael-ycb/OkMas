<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Input Dokter</h2>
    </section>

    <form action="{{ route('dokterAdmin.store') }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf
        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">
            <div>
                <label class="block font-semibold mb-1">Nama Dokter</label>
                <input type="text" name="nama_dokter" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">ID Dokter</label>
                <input type="text" name="id_dokter" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Klaster</label>
                <select name="klaster" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Klaster --</option>
                    <option value="Umum">Umum</option>
                    <option value="Gigi dan Mulut">Gigi dan Mulut</option>
                    <option value="Bidan">Bidan</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('dokterAdmin.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Tambah</button>
        </div>
    </form>
</x-layout4>
