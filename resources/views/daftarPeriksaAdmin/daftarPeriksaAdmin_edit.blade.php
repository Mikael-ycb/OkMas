<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Edit Daftar Periksa</h2>
        <p class="text-gray-600 font-medium mt-1">{{ $periksa->nama_pasien }}</p>
    </section>

    <form action="{{ route('periksa.update', $periksa->id) }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6 bg-white shadow-md p-8 rounded-xl border border-gray-200">
            <div>
                <label class="block font-semibold mb-1">Nama Pasien</label>
                <input type="text" name="nama_pasien" value="{{ $periksa->nama_pasien }}" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Klaster</label>
                <select name="klaster" class="w-full border rounded p-2">
                    <option value="Umum" {{ $periksa->klaster == 'Umum' ? 'selected' : '' }}>Umum</option>
                    <option value="Gigi dan Mulut" {{ $periksa->klaster == 'Gigi dan Mulut' ? 'selected' : '' }}>Gigi dan Mulut</option>
                    <option value="Bidan" {{ $periksa->klaster == 'Bidan' ? 'selected' : '' }}>Bidan</option>
                </select>

                <label class="block font-semibold mt-3 mb-1">Tanggal Pemeriksaan</label>
                <input type="date" name="tanggal_periksa" value="{{ $periksa->tanggal_periksa->format('Y-m-d') }}" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="Aktif" {{ $periksa->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ $periksa->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-6">
            <a href="{{ route('periksa.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Update</button>
        </div>
    </form>
</x-layout4>
