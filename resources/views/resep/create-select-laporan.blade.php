<x-layout4>
    <section class="px-20 pt-12 pb-6">
        <h1 class="text-3xl font-extrabold text-blue-900">Buat Resep Obat - Pilih Laporan</h1>
    </section>

    <div class="px-20 pb-12">
        {{-- PESAN INFO --}}
        <div class="bg-blue-50 border border-blue-300 p-4 rounded mb-6 mt-4">
            <p class="text-sm text-blue-800">
                Pilih laporan pemeriksaan pasien yang ingin diberi resep obat. Hanya laporan yang belum memiliki resep yang dapat dipilih.
            </p>
        </div>

        {{-- DAFTAR LAPORAN --}}
        <div class="grid grid-cols-1 gap-4">
            @forelse($laporan as $item)
                {{-- Cek apakah sudah ada resep --}}
                @php
                    $sudaAda = $item->resepObat && $item->resepObat->isNotEmpty();
                @endphp

                <div class="border rounded-lg p-6 {{ $sudaAda ? 'bg-gray-100 opacity-60' : 'bg-white hover:shadow-lg' }} transition">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <h3 class="text-lg font-bold text-blue-900">{{ $item->akun->nama }}</h3>
                                @if($sudaAda)
                                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">✓ Sudah Ada Resep</span>
                                @else
                                    <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded">⏳ Belum Ada Resep</span>
                                @endif
                            </div>

                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-600">NIK</p>
                                    <p class="font-medium">{{ $item->akun->nik }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Tanggal Pemeriksaan</p>
                                    <p class="font-medium">{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Jenis Pemeriksaan</p>
                                    <p class="font-medium">{{ $item->jenis_pemeriksaan ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Diagnosa</p>
                                    <p class="font-medium">{{ $item->diagnosa ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- TOMBOL AKSI --}}
                        <div class="ml-4">
                            @if($sudaAda)
                                <button disabled class="bg-gray-400 text-white px-6 py-2 rounded cursor-not-allowed">
                                    Resep Sudah Ada
                                </button>
                            @else
                                <a href="{{ route('resep.create', ['laporan_id' => $item->id]) }}"
                                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded inline-block">
                                    💊 Buat Resep
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-yellow-50 border border-yellow-300 p-6 rounded text-center">
                    <p class="text-yellow-800">Belum ada laporan pemeriksaan.</p>
                </div>
            @endforelse
        </div>

        {{-- TOMBOL KEMBALI --}}
        <div class="mt-6">
            <a href="{{ route('resep.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">
                ← Kembali
            </a>
        </div>
    </div>
</x-layout4>
