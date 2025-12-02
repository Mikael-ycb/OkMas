<x-layout4>
    {{-- HEADER --}}
    <section class="px-20 pt-12 pb-4 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">Rekam Medis</h1>

        <p class="text-gray-600 mt-1 text-lg">
            {{ $pasien->nama }} — NIK: {{ $pasien->nik }}
        </p>

        <a href="{{ route('laporanAdmin.create', ['id_akun' => $pasien->id_akun]) }}"
           class="mt-4 inline-block bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-lg shadow-md">
            ➕ Tambah Rekam Medis Baru
        </a>
    </section>

    <div class="px-20 pb-16 bg-white">

        {{-- LIST REKAM MEDIS --}}
        @forelse ($laporan as $a)
            <div class="border rounded-xl p-6 shadow mb-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-xl font-bold text-blue-900">
                            {{ $a->jenis_pemeriksaan }}
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Tanggal: {{ $a->tanggal ? \Carbon\Carbon::parse($a->tanggal)->format('d M Y') : '-' }}
                        </p>
                    </div>
                    <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded">
                        @if($a->resepObat && $a->resepObat->isNotEmpty())
                            ✓ Ada Resep
                        @else
                            ⏳ Belum Ada Resep
                        @endif
                    </span>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500 font-semibold">Diagnosa</p>
                        <p class="text-sm text-gray-700">{{ $a->diagnosa ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold">Hasil Pemeriksaan</p>
                        <p class="text-sm text-gray-700">{{ $a->hasil_pemeriksaan ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold">Anamnesis</p>
                        <p class="text-sm text-gray-700">{{ $a->anamnesis ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold">Tekanan Darah</p>
                        <p class="text-sm text-gray-700">{{ $a->tekanan_darah ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold">Saran</p>
                        <p class="text-sm text-gray-700">{{ $a->saran ?? '-' }}</p>
                    </div>
                </div>

                <div class="flex gap-4 mt-6">
                    <a href="{{ route('laporanAdmin.edit', $a->id) }}"
                       class="text-yellow-600 hover:text-yellow-800 text-lg font-medium">✏️ Edit</a>

                    @if(!$a->resepObat || $a->resepObat->isEmpty())
                        <a href="{{ route('resep.create', ['laporan_id' => $a->id]) }}"
                           class="text-green-600 hover:text-green-800 text-lg font-medium">💊 Buat Resep</a>
                    @else
                        <span class="text-green-600 text-lg font-medium">💊 Resep Sudah Ada</span>
                    @endif

                    <form action="{{ route('laporanAdmin.destroy', $a->id) }}" 
                          method="POST" onsubmit="return confirm('Hapus rekam medis ini?')" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 text-lg">🗑️ Hapus</button>
                    </form>
                </div>
            </div>

        @empty
            <p class="text-gray-500 mt-4">Belum ada rekam medis.</p>
        @endforelse

        {{-- PAGINATION --}}
        <div class="mt-6 flex justify-center">
            {{ $laporan->links() }}
        </div>
    </div>
</x-layout4>
