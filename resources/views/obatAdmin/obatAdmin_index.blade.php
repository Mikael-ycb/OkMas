<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gradient-to-r from-green-600 to-emerald-600">
        <h1 class="text-4xl font-bold text-black">💊 Manajemen Data Obat</h1>
        <p class="text-green-100 mt-2">Kelola stok dan informasi obat dalam sistem</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gray-50 min-h-screen">
        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mb-8">
            {{-- Total Obat --}}
            <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl p-6 text-black shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Jenis Obat</p>
                        <p class="text-4xl font-bold mt-2">{{ $obat->total() ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">💊</div>
                </div>
            </div>

            {{-- Total Stok --}}
            <div class="bg-gradient-to-br from-emerald-600 to-emerald-700 rounded-2xl p-6 text-black shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Stok</p>
                        <p class="text-4xl font-bold mt-2">{{ $obat->sum('stok') ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">📦</div>
                </div>
            </div>

            {{-- Stok Menipis (< 10) --}}
            <div class="bg-gradient-to-br from-red-600 to-red-700 rounded-2xl p-6 text-black shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Stok Menipis</p>
                        <p class="text-4xl font-bold mt-2">{{ $obat->where('stok', '<', 10)->count() }}</p>
                    </div>
                    <div class="text-6xl opacity-30">⚠️</div>
                </div>
            </div>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="mb-8">
            <a href="{{ route('obatAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Obat Baru
            </a>
        </div>

        {{-- DAFTAR OBAT - CARDS VIEW --}}
        @if($obat->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($obat as $item)
                <div class="bg-black rounded-2xl shadow-lg overflow-hidden border-l-4 {{ $item->stok < 10 ? 'border-red-500' : 'border-green-500' }} hover:shadow-xl transition-all duration-300">
                    {{-- HEADER CARD --}}
                    <div class="bg-gradient-to-r {{ $item->stok < 10 ? 'from-red-50 to-orange-50' : 'from-green-50 to-emerald-50' }} px-6 py-4 border-b {{ $item->stok < 10 ? 'border-red-100' : 'border-green-100' }}">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900">
                                    💊 {{ $item->nama_obat }}
                                </h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    ID: <span class="font-mono font-semibold text-green-600">{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</span>
                                </p>
                            </div>
                            @if($item->stok < 10)
                                <div class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold blackspace-nowrap animate-pulse">
                                    ⚠️ STOK MENIPIS
                                </div>
                            @else
                                <div class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold blackspace-nowrap">
                                    ✅ TERSEDIA
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="px-6 py-5 space-y-4">
                        {{-- Info Obat Grid --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-blue-600 mb-1">📏 Dosis</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $item->dosis ?? '-' }}</p>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-xl border border-purple-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-purple-600 mb-1">🏥 Penyakit</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $item->penyakit ?? '-' }}</p>
                            </div>
                        </div>

                        {{-- Info Stok & Exp --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-green-50 p-4 rounded-xl border border-green-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-green-600 mb-1">📦 Stok</p>
                                <p class="text-3xl font-bold text-gray-900">{{ $item->stok }}</p>
                                <p class="text-xs text-gray-600 mt-1">unit tersedia</p>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-xl border border-orange-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-orange-600 mb-1">📅 EXP</p>
                                <p class="text-sm font-bold text-gray-900">{{ $item->exp ?? '-' }}</p>
                                <p class="text-xs text-gray-600 mt-1">MM/YYYY</p>
                            </div>
                        </div>
                    </div>

                    {{-- FOOTER CARD - AKSI --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
                        <a href="{{ route('obatAdmin.edit', $item->id) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-black py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <span class="mr-2">✏️</span>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('obatAdmin.destroy', $item->id) }}" method="POST" 
                              onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus obat ini?');"
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
                    <div class="bg-black rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
                        <p class="text-6xl mb-4">💊</p>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Data Obat</h3>
                        <p class="text-gray-600 mb-6">Mulai dengan menambahkan obat baru ke sistem</p>
                        <a href="{{ route('obatAdmin.create') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300">
                            <span class="text-2xl mr-3">➕</span>
                            Tambah Obat Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $obat->links() }}
        </div>
        @else
        <div class="bg-black rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
            <p class="text-6xl mb-4">💊</p>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Data Obat</h3>
            <p class="text-gray-600 mb-6">Mulai dengan menambahkan obat baru ke sistem</p>
            <a href="{{ route('obatAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Obat Pertama
            </a>
        </div>
        @endif

    </div>
</x-layout4>
