<x-layout4>
    <section class="px-20 pt-12 pb-6">
        <h1 class="text-3xl font-extrabold text-blue-900">Buat Resep Obat</h1>
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

    <form action="{{ route('resep.store') }}" method="POST" class="px-20 pb-12 bg-white">
        @csrf

        {{-- LAPORAN HIDDEN --}}
        <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">

        {{-- INFO LAPORAN --}}
        <div class="bg-blue-50 border border-blue-300 p-4 rounded mb-6 mt-4">
            <p class="text-sm text-gray-600">Pasien: <span class="font-semibold">{{ $pasien->nama }}</span></p>
            <p class="text-sm text-gray-600">Jenis Pemeriksaan: <span class="font-semibold">{{ $laporan->jenis_pemeriksaan }}</span></p>
            <p class="text-sm text-gray-600">Tanggal: <span class="font-semibold">{{ $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('d/m/Y') : '-' }}</span></p>
            <p class="text-sm text-gray-600">Diagnosa: <span class="font-semibold">{{ $laporan->diagnosa ?? '-' }}</span></p>
        </div>

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 border border-red-300 px-4 py-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- INPUT DOKTER --}}
        <label class="block font-semibold mt-4">Dokter</label>
        <input type="text" name="dokter" class="w-full border rounded px-3 py-2 @error('dokter') border-red-500 @enderror" value="{{ old('dokter', auth()->user()->nama ?? '') }}" required>
        @error('dokter') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        {{-- TANGGAL --}}
        <label class="block font-semibold mt-4">Tanggal Resep</label>
        <input type="date" name="tanggal" class="w-full border rounded px-3 py-2 @error('tanggal') border-red-500 @enderror" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
        @error('tanggal') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        {{-- DETAIL OBAT --}}
        <label class="block font-semibold mt-6">Detail Obat</label>
        <div id="obat-container">
            <div class="grid grid-cols-3 gap-4 border p-4 rounded mb-4">
                <div>
                    <label class="text-xs text-gray-600">Obat *</label>
                    <select name="obat[]" class="border rounded px-2 py-1 w-full" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach($obat as $o)
                            <option value="{{ $o->id }}">{{ $o->nama_obat }} (Stok: {{ $o->stok }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-xs text-gray-600">Jumlah *</label>
                    <input type="number" name="jumlah[]" placeholder="Jumlah" class="border rounded px-2 py-1 w-full" min="1" required>
                </div>

                <div>
                    <label class="text-xs text-gray-600">Aturan Pakai</label>
                    <input type="text" name="aturan_pakai[]" placeholder="3x1 sesudah makan" class="border rounded px-2 py-1 w-full">
                </div>
            </div>
        </div>

        <button type="button" class="mt-2 bg-gray-500 text-white px-4 py-1 rounded text-sm hover:bg-gray-600" onclick="tambahObat()">
            + Tambah Obat
        </button>

        @error('obat') <span class="text-red-600 text-sm block mt-2">{{ $message }}</span> @enderror
        @error('jumlah') <span class="text-red-600 text-sm block mt-2">{{ $message }}</span> @enderror

        <div class="mt-6 flex gap-4">
            <a href="{{ route('laporan') }}" class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
                Batal
            </a>
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">
                Simpan Resep
            </button>
        </div>
    </form>

    <script>
        function tambahObat() {
            const container = document.getElementById('obat-container');
            const div = document.createElement('div');
            div.className = 'grid grid-cols-3 gap-4 border p-4 rounded mb-4 relative';
            div.innerHTML = `
                <div>
                    <label class="text-xs text-gray-600">Obat *</label>
                    <select name="obat[]" class="border rounded px-2 py-1 w-full" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach($obat as $o)
                            <option value="{{ $o->id }}">{{ $o->nama_obat }} (Stok: {{ $o->stok }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-xs text-gray-600">Jumlah *</label>
                    <input type="number" name="jumlah[]" placeholder="Jumlah" class="border rounded px-2 py-1 w-full" min="1" required>
                </div>
                <div class="relative">
                    <label class="text-xs text-gray-600">Aturan Pakai</label>
                    <input type="text" name="aturan_pakai[]" placeholder="3x1 sesudah makan" class="border rounded px-2 py-1 w-full">
                    <button type="button" class="absolute top-6 right-2 text-red-600 hover:text-red-800 text-lg" onclick="this.parentElement.parentElement.remove()">✕</button>
                </div>
            `;
            container.appendChild(div);
        }
    </script>
</x-layout4>
