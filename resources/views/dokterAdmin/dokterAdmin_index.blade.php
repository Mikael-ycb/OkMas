<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gradient-to-r from-purple-600 to-indigo-600">
        <h1 class="text-4xl font-bold text-black">👨‍⚕️ Manajemen Data Dokter</h1>
        <p class="text-purple-100 mt-2">Kelola semua informasi dokter dalam sistem</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gray-50 min-h-screen">
        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mb-8">
            {{-- Total Dokter --}}
            <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl p-6 text-black shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Dokter</p>
                        <p class="text-4xl font-bold mt-2">{{ $dokter->total() ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">👨‍⚕️</div>
                </div>
            </div>

            {{-- Total Klaster --}}
            <div class="bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-2xl p-6 text-black shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Klaster</p>
                        <p class="text-4xl font-bold mt-2">{{ $dokter->groupBy('klaster_id')->count() }}</p>
                    </div>
                    <div class="text-6xl opacity-30">🏥</div>
                </div>
            </div>

            {{-- Rata-rata per Klaster --}}
            <div class="bg-gradient-to-br from-pink-600 to-pink-700 rounded-2xl p-6 text-black shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Rata-rata Dokter</p>
                        <p class="text-4xl font-bold mt-2">{{ $dokter->groupBy('klaster_id')->count() > 0 ? round($dokter->count() / $dokter->groupBy('klaster_id')->count(), 1) : 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">📊</div>
                </div>
            </div>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="mb-8">
            <a href="{{ route('dokterAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Dokter Baru
            </a>
        </div>

        {{-- DAFTAR DOKTER - CARDS VIEW --}}
        @if($dokter->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($dokter as $item)
                <div class="bg-black rounded-2xl shadow-lg overflow-hidden border-l-4 border-purple-500 hover:shadow-xl transition-all duration-300">
                    {{-- HEADER CARD --}}
                    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 px-6 py-4 border-b border-purple-100">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900">
                                    👨‍⚕️ {{ $item->nama_dokter }}
                                </h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    ID: <span class="font-mono font-semibold text-purple-600">{{ $item->id_dokter }}</span>
                                </p>
                            </div>
                            <div class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold blackspace-nowrap">
                                {{ $item->spesialisasi ?? '🏥 Umum' }}
                            </div>
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="px-6 py-5 space-y-4">
                        {{-- Info Klaster --}}
                        <div class="bg-indigo-50 p-4 rounded-xl border border-indigo-100">
                            <p class="text-xs uppercase tracking-wide font-semibold text-indigo-600 mb-1">🏥 Klaster / Departemen</p>
                            <p class="text-sm font-semibold text-gray-900">
                                {{ $item->klaster ? $item->klaster->nama : '❌ Tidak ada klaster' }}
                            </p>
                            @if($item->klaster)
                            <p class="text-xs text-gray-600 mt-1">{{ $item->klaster->jenis ?? '-' }}</p>
                            @endif
                        </div>

                        {{-- Info Dokter Tambahan --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                <p class="text-xs font-semibold text-blue-600 mb-1">Tipe</p>
                                <p class="text-sm font-bold text-gray-900">
                                    @if($item->spesialisasi)
                                        🎓 Spesialis
                                    @else
                                        👨‍⚕️ Umum
                                    @endif
                                </p>
                            </div>
                            <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                                <p class="text-xs font-semibold text-green-600 mb-1">Status</p>
                                <p class="text-sm font-bold text-gray-900">✅ Aktif</p>
                            </div>
                        </div>
                    </div>

                    {{-- FOOTER CARD - AKSI --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
                        <a href="{{ route('dokterAdmin.edit', $item->id) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-black py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <span class="mr-2">✏️</span>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('dokterAdmin.destroy', $item->id) }}" method="POST" 
                              onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus data dokter ini?');"
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
                        <p class="text-6xl mb-4">👨‍⚕️</p>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Data Dokter</h3>
                        <p class="text-gray-600 mb-6">Mulai dengan menambahkan dokter baru ke sistem</p>
                        <a href="{{ route('dokterAdmin.create') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300">
                            <span class="text-2xl mr-3">➕</span>
                            Tambah Dokter Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $dokter->links() }}
        </div>
        @else
        <div class="bg-black rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
            <p class="text-6xl mb-4">👨‍⚕️</p>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Data Dokter</h3>
            <p class="text-gray-600 mb-6">Mulai dengan menambahkan dokter baru ke sistem</p>
            <a href="{{ route('dokterAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Dokter Pertama
            </a>
        </div>
        @endif

    </div>
</x-layout4>
