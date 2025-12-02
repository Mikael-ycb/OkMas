<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gradient-to-r from-blue-900 to-blue-800">
        <h1 class="text-4xl font-bold text-white">💊 Daftar Resep Obat</h1>
        <p class="text-blue-100 mt-2">Kelola dan lihat semua resep obat pasien</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gray-50 min-h-screen">

        {{-- PESAN SUKSES --}}
        @if(session('success'))
            <div class="mt-6 mb-6 bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border-l-4 border-green-500 px-6 py-4 rounded-lg shadow-md flex items-center">
                <span class="text-2xl mr-3">✓</span>
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        {{-- TOMBOL BUAT RESEP BARU --}}
        <div class="mt-6 mb-8">
            <a href="{{ route('resep.create') }}" class="inline-flex items-center bg-gradient-to-r from-blue-900 to-blue-800 hover:from-blue-800 hover:to-blue-700 text-white px-8 py-4 rounded-lg shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Buat Resep Obat Baru
            </a>
        </div>

        {{-- TABLE RESEP --}}
        @if($resep->isNotEmpty())
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-blue-900 to-blue-800 text-white">
                        <tr>
                            <th class="px-6 py-5 text-left text-sm font-bold">👤 Nama Pasien</th>
                            <th class="px-6 py-5 text-left text-sm font-bold">📅 Tanggal Resep</th>
                            <th class="px-6 py-5 text-left text-sm font-bold">👨‍⚕️ Dokter</th>
                            <th class="px-6 py-5 text-center text-sm font-bold">⚙️ Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($resep as $r)
                            <tr class="border-b hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-6 py-5 font-semibold text-gray-900">
                                    {{ $r->pasien ? $r->pasien->nama : '❌ Data Kosong' }}
                                </td>
                                <td class="px-6 py-5 text-gray-700 font-medium">
                                    📅 {{ $r->tanggal ? \Carbon\Carbon::parse($r->tanggal)->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-6 py-5 text-gray-700 font-medium">
                                    @if($r->laporan && $r->laporan->janjiTemu && $r->laporan->janjiTemu->dokter)
                                        {{ $r->laporan->janjiTemu->dokter->nama_dokter }}
                                    @elseif($r->laporan && $r->laporan->periksa && $r->laporan->periksa->janjiTemu && $r->laporan->periksa->janjiTemu->dokter)
                                        {{ $r->laporan->periksa->janjiTemu->dokter->nama_dokter }}
                                    @else
                                        {{ $r->dokter ?? '-' }}
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('resep.show', $r->id) }}" 
                                           class="inline-flex items-center justify-center w-10 h-10 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition-all duration-200 text-lg"
                                           title="Lihat Detail">
                                            👁️
                                        </a>
                                        <form action="{{ route('resep.destroy', $r->id) }}" method="POST" 
                                              onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus resep ini? Stok obat akan dikembalikan.');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center justify-center w-10 h-10 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-all duration-200 text-lg"
                                                    title="Hapus Resep">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-12">
                                    <p class="text-4xl mb-3">📭</p>
                                    <p class="text-lg text-gray-600 font-medium">Belum ada resep obat</p>
                                    <p class="text-gray-500 mt-2">Mulai buat resep baru dengan mengklik tombol di atas</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $resep->links() }}
        </div>
        @else
        {{-- EMPTY STATE --}}
        <div class="mt-12 bg-white rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
            <p class="text-6xl mb-4">📭</p>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Tidak Ada Resep Obat</h3>
            <p class="text-gray-600 mb-6">Mulai dengan membuat resep obat baru untuk pasien Anda</p>
            <a href="{{ route('resep.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-blue-900 to-blue-800 hover:from-blue-800 hover:to-blue-700 text-white px-8 py-4 rounded-lg shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Buat Resep Pertama Anda
            </a>
        </div>
        @endif

    </div>
</x-layout4>
