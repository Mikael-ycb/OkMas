<x-layout4>
    <section class="flex flex-col items-start justify-center px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Tambah Akun Pasien</h2>
    </section>

    <form action="{{ route('akunPasienAdmin.store') }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">

            {{-- Nama --}}
            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="w-full border rounded p-2">
                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- NIK --}}
            <div>
                <label class="block font-semibold mb-1">NIK</label>
                <input type="text" name="nik" value="{{ old('nik') }}"
                    class="w-full border rounded p-2">
                @error('nik')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Username --}}
            <div>
                <label class="block font-semibold mb-1">Username</label>
                <input type="text" name="username" value="{{ old('username') }}"
                    class="w-full border rounded p-2">
                @error('username')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block font-semibold mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border rounded p-2">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div>
                <label class="block font-semibold mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                    class="w-full border rounded p-2">
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block font-semibold mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded p-2">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Pekerjaan --}}
            <div>
                <label class="block font-semibold mb-1">Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}"
                    class="w-full border rounded p-2">
            </div>

            {{-- Status --}}
            <div>
                <label class="block font-semibold mb-1">Status</label>
                <input type="text" name="status" value="{{ old('status') }}"
                    class="w-full border rounded p-2">
            </div>

            {{-- No Telepon --}}
            <div>
                <label class="block font-semibold mb-1">No Telepon</label>
                <input type="text" name="no_telepon" value="{{ old('no_telepon') }}"
                    class="w-full border rounded p-2">
            </div>

            {{-- Alamat --}}
            <div class="col-span-2">
                <label class="block font-semibold mb-1">Alamat</label>
                <textarea name="alamat" class="w-full border rounded p-2" rows="3">{{ old('alamat') }}</textarea>
            </div>

        </div>

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('akunPasienAdmin.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Simpan</button>
        </div>
    </form>
</x-layout4>
