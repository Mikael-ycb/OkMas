<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gray-50">
        <a href="{{ route('resep.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 font-semibold group">
            <span class="group-hover:-translate-x-1 transition-transform">←</span>
            <span class="ml-2">Kembali ke Daftar Resep</span>
        </a>
        <h1 class="text-4xl font-bold text-blue-900">💊 Detail Resep Obat</h1>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gray-50 min-h-screen">

        {{-- INFO PASIEN & RESEP --}}
        <div class="bg-gradient-to-r from-blue-900 to-blue-800 rounded-2xl p-8 text-white mb-6 shadow-lg">
            <h2 class="text-2xl font-bold mb-6">👤 Data Pasien & Resep</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="border-b md:border-b-0 md:border-r border-white/30 pb-6 md:pb-0 md:pr-8">
                    <p class="text-sm opacity-80 mb-2">Nama Pasien</p>
                    <p class="text-2xl font-bold">{{ $resep->laporan->akun->nama ?? '-' }}</p>
                </div>
                <div class="border-b md:border-b-0 md:border-r border-white/30 pb-6 md:pb-0 md:pr-8">
                    <p class="text-sm opacity-80 mb-2">NIK</p>
                    <p class="text-xl font-mono font-bold">{{ $resep->laporan->akun->nik ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm opacity-80 mb-2">Tanggal Resep</p>
                    <p class="text-xl font-bold">📅 {{ $resep->tanggal ? \Carbon\Carbon::parse($resep->tanggal)->format('d M Y') : '-' }}</p>
                </div>
            </div>
        </div>

        {{-- DOKTER PEMERIKSA --}}
        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">👨‍⚕️ Dokter Pemeriksa</h2>
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-6 rounded-xl border-l-4 border-blue-500">
                <p class="text-3xl font-bold text-blue-900">
                    @if($resep->laporan->janjiTemu && $resep->laporan->janjiTemu->dokter)
                        {{ $resep->laporan->janjiTemu->dokter->nama_dokter }}
                    @elseif($resep->laporan->periksa && $resep->laporan->periksa->janjiTemu && $resep->laporan->periksa->janjiTemu->dokter)
                        {{ $resep->laporan->periksa->janjiTemu->dokter->nama_dokter }}
                    @else
                        {{ $resep->dokter ?? '-' }}
                    @endif
                </p>
            </div>
        </div>

        {{-- INFO PEMERIKSAAN --}}
        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">🏥 Informasi Pemeriksaan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-3">Jenis Pemeriksaan</p>
                    <p class="text-lg font-bold text-gray-800 bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                        🔬 {{ $resep->laporan->jenis_pemeriksaan ?? '-' }}
                    </p>

                    <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-3 mt-4">Tanggal Pemeriksaan</p>
                    <p class="text-lg font-bold text-gray-800 bg-gray-100 p-4 rounded-lg">
                        📅 {{ $resep->laporan->tanggal ? \Carbon\Carbon::parse($resep->laporan->tanggal)->format('d M Y') : '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-3">Diagnosa</p>
                    <p class="text-lg font-bold text-red-900 bg-red-50 p-4 rounded-lg border-l-4 border-red-500">
                        🔍 {{ $resep->laporan->diagnosa ?? '-' }}
                    </p>

                    <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-3 mt-4">Hasil Pemeriksaan</p>
                    <p class="text-lg font-bold text-green-900 bg-green-50 p-4 rounded-lg border-l-4 border-green-500">
                        ✓ {{ $resep->laporan->hasil_pemeriksaan ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- DETAIL OBAT --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 mb-6">
            <div class="bg-gradient-to-r from-orange-600 to-red-600 text-white px-8 py-6">
                <h3 class="text-3xl font-bold flex items-center">
                    <span class="text-4xl mr-3">💊</span> OBAT-OBATAN YANG DIBERIKAN
                </h3>
            </div>

            @if($resep->detail && $resep->detail->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b-2 border-gray-300">
                            <tr>
                                <th class="px-8 py-4 text-left text-sm font-bold text-gray-700">No</th>
                                <th class="px-8 py-4 text-left text-sm font-bold text-gray-700">💊 Nama Obat</th>
                                <th class="px-8 py-4 text-left text-sm font-bold text-gray-700">📏 Dosis</th>
                                <th class="px-8 py-4 text-left text-sm font-bold text-gray-700">📦 Jumlah</th>
                                <th class="px-8 py-4 text-left text-sm font-bold text-gray-700">📋 Aturan Pakai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resep->detail as $index => $detail)
                                <tr class="border-b hover:bg-blue-50 transition-colors duration-200">
                                    <td class="px-8 py-5 text-sm font-bold text-gray-800 bg-blue-50 rounded-l-lg">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-8 py-5 text-base font-semibold text-gray-900">
                                        {{ $detail->obat->nama_obat ?? '-' }}
                                    </td>
                                    <td class="px-8 py-5 text-sm text-gray-700 font-medium">
                                        {{ $detail->obat->dosis ?? '-' }}
                                    </td>
                                    <td class="px-8 py-5 text-sm font-bold text-blue-900">
                                        <span class="bg-blue-100 px-4 py-2 rounded-full">{{ $detail->jumlah }}</span>
                                    </td>
                                    <td class="px-8 py-5 text-sm text-gray-700 rounded-r-lg">
                                        <span class="bg-yellow-100 px-3 py-1 rounded-lg">{{ $detail->aturan_pakai ?? '-' }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="px-8 py-12 text-center bg-yellow-50">
                    <p class="text-2xl">⚠️</p>
                    <p class="text-lg text-yellow-800 font-semibold mt-2">Belum ada obat dalam resep ini</p>
                </div>
            @endif
        </div>

        {{-- CATATAN PENTING --}}
        @if ($resep->laporan->saran || $resep->laporan->anamnesis)
        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
            <h2 class="text-2xl font-bold text-purple-600 mb-4">💡 Catatan Penting</h2>
            @if ($resep->laporan->saran)
            <div class="mb-4 pb-4 border-b">
                <p class="text-sm uppercase tracking-wider font-semibold text-gray-600 mb-2">Saran Dokter</p>
                <p class="text-gray-700 italic leading-relaxed">{{ $resep->laporan->saran }}</p>
            </div>
            @endif
            @if ($resep->laporan->anamnesis)
            <div>
                <p class="text-sm uppercase tracking-wider font-semibold text-gray-600 mb-2">Riwayat Keluhan</p>
                <p class="text-gray-700 leading-relaxed">{{ $resep->laporan->anamnesis }}</p>
            </div>
            @endif
        </div>
        @endif

        {{-- TOMBOL AKSI --}}
        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <a href="{{ route('resep.index') }}" 
               class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-8 py-4 rounded-lg hover:from-gray-600 hover:to-gray-700 font-semibold transition-all duration-300 shadow-md hover:shadow-lg text-center">
                ← Kembali ke Daftar Resep
            </a>

            <form action="{{ route('resep.destroy', $resep->id) }}" method="POST" 
                  onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus resep ini? Stok obat akan dikembalikan.')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-lg hover:from-red-700 hover:to-red-800 font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                    🗑️ Hapus Resep
                </button>
            </form>
        </div>

    </div>
</x-layout4>
