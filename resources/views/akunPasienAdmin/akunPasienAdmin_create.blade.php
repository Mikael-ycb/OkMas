<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Tambah Akun Pasien</h2>
    </section>

    <form action="{{ route('akunPasienAdmin.store') }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">
            <div>
                <label class="block font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">NIK</label>
                <input type="text" name="nik" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Username</label>
                <input type="text" name="username" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded p-2">
                    <option value="">Pilih...</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label class="block font-semibold mt-3 mb-1">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Status</label>
                <input type="text" name="status" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">No. Telepon</label>
                <input type="text" name="no_telepon" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded p-2" rows="3"></textarea>
            </div>
        </div>

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('akunPasienAdmin.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Simpan</button>
        </div>
    </form>
</x-layout4>
