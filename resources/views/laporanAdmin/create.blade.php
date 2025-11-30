<x-layout4>
    {{-- HEADER --}}
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">Tambah Rekam Medis</h1>
    </section>

    <form action="{{ route('laporanAdmin.store') }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">

            {{-- Jika datang dari detail pasien --}}
            @if(request('id_akun'))
                <input type="hidden" name="id_akun" value="{{ request('id_akun') }}">

                <div>
                    <label class="font-semibold mb-1 block">Nama Pasien</label>
                    <input type="text" value="{{ $pasien->nama }}" disabled class="w-full border rounded p-2">

                    <label class="font-semibold mt-3 mb-1 block">NIK</label>
                    <input type="text" value="{{ $pasien->nik }}" disabled class="w-full border rounded p-2">
                </div>

            {{-- Jika dari Index --}}
            @else
                <div>
                    <label class="block font-semibold mb-1">Pilih Pasien</label>
                    <select name="id_akun" class="w-full border rounded p-2" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($akun as $a)
                                <option value="{{ $a->id_akun }}" 
                                {{ old('id_akun') == $a->id_akun ? 'selected' : '' }}> 
                                {{ $a->nama }} — {{ $a->nik }}
                        </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div>
                <label class="block font-semibold mb-1">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border rounded p-2">

                <label class="block font-semibold mt-3 mb-1">Jenis Pemeriksaan</label>
                <input type="text" name="jenis_pemeriksaan" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Hasil Pemeriksaan</label>
                <textarea name="hasil_pemeriksaan" class="w-full border rounded p-2" rows="4"></textarea>
            </div>
        </div>

        {{-- Bagian Form Klinis --}}
        @include('laporanAdmin.partials.form-klinis')

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('laporanAdmin.index') }}" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Simpan</button>
        </div>
    </form>
</x-layout4>
