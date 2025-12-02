<x-layout4>
    {{-- HEADER --}}
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">Tambah Rekam Medis</h1>
    </section>

    {{-- PESAN SUKSES/ERROR --}}
    @if(session('success'))
        <div class="mx-20 mt-4 bg-green-100 text-green-700 border border-green-300 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mx-20 mt-4 bg-red-100 text-red-700 border border-red-300 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('laporanAdmin.store') }}" method="POST" class="px-20 pb-20 bg-white">
        @csrf

        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border">

            {{-- Jika datang dari detail pasien --}}
            @if(request('id_akun'))
                <input type="hidden" name="id_akun" value="{{ request('id_akun') }}">

                <div>
                    <label class="font-semibold mb-1 block">Nama Pasien</label>
                    <input type="text" value="{{ $akun->nama ?? '' }}" disabled class="w-full border rounded p-2 bg-gray-100">

                    <label class="font-semibold mt-3 mb-1 block">NIK</label>
                    <input type="text" value="{{ $akun->nik ?? '' }}" disabled class="w-full border rounded p-2 bg-gray-100">
                </div>

                {{-- Pilih dari Janji Temu --}}
                <div>
                    <label class="block font-semibold mb-1">Pilih Janji Temu <span class="text-gray-500 text-sm">(Hanya yang belum memiliki laporan)</span></label>
                    {{-- Hidden field untuk simpan janji_temu_id --}}
                    <input type="hidden" id="janji-temu-id-hidden" name="janji_temu_id" value="">
                    
                    @if($janji_temu && $janji_temu->count() > 0)
                        <select name="janji_temu_id" id="janji-temu-select" class="w-full border rounded p-2" onchange="isiDataDariJanjiTemu()">
                            <option value="">-- Pilih Janji Temu --</option>
                            @foreach($janji_temu as $jt)
                                <option value="{{ $jt->id }}" 
                                    data-tanggal="{{ $jt->tanggal->tanggal ?? '' }}"
                                    data-klaster="{{ $jt->klaster->nama ?? '' }}"
                                    data-dokter="{{ $jt->dokter->nama_dokter ?? '' }}"
                                    data-keluhan="{{ $jt->keluhan ?? '' }}"
                                    data-status="{{ $jt->status ?? 'belum_diproses' }}">
                                    {{ $jt->tanggal->tanggal ?? '-' }} - {{ $jt->klaster->nama ?? '-' }} 
                                    <span class="text-xs">
                                        @if($jt->status == 'selesai')
                                            ✓ Selesai
                                        @elseif($jt->status == 'dalam_proses')
                                            ⏳ Dalam Proses
                                        @else
                                            ⏹ Belum Dimulai
                                        @endif
                                    </span>
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="bg-yellow-50 border border-yellow-300 p-3 rounded text-yellow-700 text-sm">
                            Semua janji temu pasien sudah memiliki laporan rekam medis.
                        </div>
                    @endif
                </div>

            {{-- Jika dari Index --}}
            @else
                <div>
                    <label class="block font-semibold mb-1">Pilih Pasien</label>
                    <select name="id_akun" class="w-full border rounded p-2" onchange="reloadForm()" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($daftar_akun as $a)
                                <option value="{{ $a->id_akun }}" 
                                {{ old('id_akun') == $a->id_akun ? 'selected' : '' }}> 
                                {{ $a->nama }} — {{ $a->nik }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div></div> {{-- Kosong untuk grid balance --}}
            @endif
        </div>

        {{-- Form Detail --}}
        <div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border mt-6">
            <div>
                <label class="block font-semibold mb-1">Tanggal Pemeriksaan</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" class="w-full border rounded p-2" required>

                <label class="block font-semibold mt-3 mb-1">Klaster Pemeriksaan</label>
                <select name="jenis_pemeriksaan" id="klaster" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih Klaster --</option>
                    @foreach($klaster as $k)
                        <option value="{{ $k->nama }}" {{ old('jenis_pemeriksaan') == $k->nama ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Dokter</label>
                <input type="text" name="dokter_pemeriksaan" id="dokter" class="w-full border rounded p-2 bg-gray-50" readonly>

                <label class="block font-semibold mt-3 mb-1">Keluhan</label>
                <input type="text" name="keluhan_pemeriksaan" id="keluhan" class="w-full border rounded p-2 bg-gray-50" readonly>
            </div>
        </div>

        {{-- Hasil Pemeriksaan --}}
        <div class="bg-white p-6 rounded-lg shadow border mt-6">
            <label class="block font-semibold mb-1">Hasil Pemeriksaan</label>
            <textarea name="hasil_pemeriksaan" class="w-full border rounded p-2" rows="4">{{ old('hasil_pemeriksaan') }}</textarea>
        </div>

        {{-- Bagian Form Klinis --}}
        @include('laporanAdmin.partials.form-klinis')

        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('laporanAdmin.index') }}" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">Batal</a>
            <button class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Simpan</button>
        </div>
    </form>

    <script>
        function isiDataDariJanjiTemu() {
            const select = document.getElementById('janji-temu-select');
            const option = select.options[select.selectedIndex];
            
            // Simpan janji_temu_id ke hidden field
            document.getElementById('janji-temu-id-hidden').value = option.value || '';
            
            if (option.value) {
                document.getElementById('tanggal').value = option.getAttribute('data-tanggal');
                document.getElementById('klaster').value = option.getAttribute('data-klaster');
                document.getElementById('dokter').value = option.getAttribute('data-dokter');
                document.getElementById('keluhan').value = option.getAttribute('data-keluhan');
            } else {
                document.getElementById('tanggal').value = '';
                document.getElementById('klaster').value = '';
                document.getElementById('dokter').value = '';
                document.getElementById('keluhan').value = '';
            }
        }

        function reloadForm() {
            const select = document.querySelector('select[name="id_akun"]');
            const id = select.value;
            if (id) {
                window.location.href = `{{ route('laporanAdmin.create') }}?id_akun=${id}`;
            }
        }
    </script>
</x-layout4>
