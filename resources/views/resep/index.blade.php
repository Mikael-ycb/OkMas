<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gradient-to-r from-orange-600 to-red-600">
        <h1 class="text-4xl font-bold text-black">💊 Daftar Resep Obat</h1>
        <p class="text-orange-100 mt-2">Kelola dan lihat semua resep obat pasien dengan mudah</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gray-50 min-h-screen">

        {{-- PESAN SUKSES --}}
        @if(session('success'))
            <div class="mt-6 mb-6 bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border-l-4 border-green-500 px-6 py-4 rounded-lg shadow-md flex items-center">
                <span class="text-2xl mr-3">✓</span>
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        {{-- STATISTIK RESEP --}}
        @if($resep->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mb-8">
            {{-- Total Resep --}}
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Resep</p>
                        <p class="text-4xl font-bold mt-2">{{ $resep->total() ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">💊</div>
                </div>
            </div>

            {{-- Total Pasien Unik --}}
            <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Pasien Terlayani</p>
                        <p class="text-4xl font-bold mt-2">{{ $resep->groupBy('id_akun')->count() }}</p>
                    </div>
                    <div class="text-6xl opacity-30">👥</div>
                </div>
            </div>

            {{-- Total Obat --}}
            <div class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Item Obat</p>
                        <p class="text-4xl font-bold mt-2">
                            {{ $resep->reduce(function($carry, $item) { return $carry + ($item->detail ? $item->detail->count() : 0); }, 0) }}
                        </p>
                    </div>
                    <div class="text-6xl opacity-30">📦</div>
                </div>
            </div>
        </div>
        @endif

        {{-- TOMBOL BUAT RESEP BARU --}}
        <div class="mt-6 mb-8">
            <a href="{{ route('resep.create') }}" class="inline-flex items-center bg-gradient-to-r from-blue-900 to-blue-800 hover:from-blue-800 hover:to-blue-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Buat Resep Obat Baru
            </a>
        </div>

        {{-- RESEP CARDS --}}
        @if($resep->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($resep as $r)
                <div class="bg-black rounded-2xl shadow-lg overflow-hidden border-l-4 border-orange-500 hover:shadow-xl transition-all duration-300">
                    {{-- HEADER CARD --}}
                    <div class="bg-gradient-to-r from-orange-50 to-red-50 px-6 py-4 border-b border-orange-100">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900">
                                    💊 {{ $r->pasien ? $r->pasien->nama : '❌ Data Kosong' }}
                                </h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    📋 Resep ID: <span class="font-mono font-semibold text-orange-600">#{{ str_pad($r->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </p>
                            </div>
                            <div class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-semibold blackspace-nowrap">
                                {{ $r->detail ? $r->detail->count() : 0 }} Obat
                            </div>
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="px-6 py-5 space-y-4">
                        {{-- Info Dokter & Tanggal --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-blue-600 mb-1">Dokter</p>
                                <p class="font-semibold text-gray-900 text-sm">
                                    @if($r->laporan && $r->laporan->janjiTemu && $r->laporan->janjiTemu->dokter)
                                        👨‍⚕️ {{ $r->laporan->janjiTemu->dokter->nama_dokter }}
                                    @elseif($r->laporan && $r->laporan->periksa && $r->laporan->periksa->janjiTemu && $r->laporan->periksa->janjiTemu->dokter)
                                        👨‍⚕️ {{ $r->laporan->periksa->janjiTemu->dokter->nama_dokter }}
                                    @else
                                        {{ $r->dokter ?? '-' }}
                                    @endif
                                </p>
                            </div>
                            <div class="bg-red-50 p-4 rounded-xl border border-red-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-red-600 mb-1">Tanggal Resep</p>
                                <p class="font-semibold text-gray-900 text-sm">📅 {{ $r->tanggal ? \Carbon\Carbon::parse($r->tanggal)->format('d/m/Y') : '-' }}</p>
                            </div>
                        </div>

                        {{-- Daftar Obat Preview --}}
                        @if($r->detail && $r->detail->isNotEmpty())
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <p class="text-xs uppercase tracking-wide font-semibold text-gray-700 mb-3">Obat-Obatan:</p>
                            <div class="space-y-2 max-h-32 overflow-y-auto">
                                @foreach($r->detail as $detail)
                                    <div class="flex justify-between items-start text-sm">
                                        <div class="flex-1">
                                            <p class="font-semibold text-gray-900">{{ $detail->obat->nama_obat ?? '-' }}</p>
                                            <p class="text-xs text-gray-600 mt-0.5">{{ $detail->obat->dosis ?? '-' }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="inline-block bg-blue-100 text-blue-700 px-2.5 py-0.5 rounded-full text-xs font-bold">{{ $detail->jumlah }}x</span>
                                            @if($detail->aturan_pakai)
                                            <p class="text-xs text-gray-600 mt-0.5">{{ $detail->aturan_pakai }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- FOOTER CARD - AKSI --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
                        <a href="{{ route('resep.show', $r->id) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-black py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm group">
                            <span class="mr-2">👁️</span>
                            <span>Lihat Detail</span>
                        </a>
                        <form action="{{ route('resep.destroy', $r->id) }}" method="POST" 
                              onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus resep ini? Stok obat akan dikembalikan.');"
                              class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-black py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                                <span class="mr-2">🗑️</span>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <p class="text-4xl mb-3 text-center">📭</p>
                    <p class="text-lg text-gray-600 font-medium text-center">Belum ada resep obat</p>
                    <p class="text-gray-500 mt-2 text-center">Mulai buat resep baru dengan mengklik tombol di atas</p>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $resep->links() }}
        </div>
        @else
        {{-- EMPTY STATE --}}
        <div class="mt-12 bg-black rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
            <p class="text-6xl mb-4">📭</p>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Tidak Ada Resep Obat</h3>
            <p class="text-gray-600 mb-6">Mulai dengan membuat resep obat baru untuk pasien Anda</p>
            <a href="{{ route('resep.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-blue-900 to-blue-800 hover:from-blue-800 hover:to-blue-700 text-black px-8 py-4 rounded-lg shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Buat Resep Pertama Anda
            </a>
        </div>
        @endif

    </div>
</x-layout4>
