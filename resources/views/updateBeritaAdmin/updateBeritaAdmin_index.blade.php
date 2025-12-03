<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gradient-to-r from-blue-600 to-cyan-600">
        <h1 class="text-4xl font-bold text-black">📰 Manajemen Berita & Informasi</h1>
        <p class="text-blue-100 mt-2">Kelola berita dan informasi puskesmas untuk publik</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gray-50 min-h-screen">
        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mb-8">
            {{-- Total Berita --}}
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Berita</p>
                        <p class="text-4xl font-bold mt-2">{{ $totalBerita ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">📰</div>
                </div>
            </div>

            {{-- Berita Bulan Ini --}}
            <div class="bg-gradient-to-br from-cyan-600 to-cyan-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Bulan Ini</p>
                        <p class="text-4xl font-bold mt-2">{{ $beritaBulanIni ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">📅</div>
                </div>
            </div>

            {{-- Program Aktif --}}
            <div class="bg-gradient-to-br from-teal-600 to-teal-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Program Unik</p>
                        <p class="text-4xl font-bold mt-2">{{ $programUnik ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">🎯</div>
                </div>
            </div>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="mb-8">
            <a href="{{ route('berita.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Buat Berita Baru
            </a>
        </div>

        {{-- DAFTAR BERITA - CARDS VIEW --}}
        @if($berita->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($berita as $item)
                <div class="bg-black rounded-2xl shadow-lg overflow-hidden border-l-4 border-blue-500 hover:shadow-xl transition-all duration-300">
                    {{-- HEADER CARD --}}
                    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 px-6 py-5 border-b border-blue-100">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 line-clamp-2">
                                    📰 {{ $item->judul }}
                                </h3>
                                <p class="text-sm text-gray-600 mt-2">
                                    📅 {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : 'Tidak diset' }}
                                </p>
                            </div>
                            @if($item->program)
                            <div class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold blackspace-nowrap">
                                🎯 {{ $item->program }}
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="px-6 py-5 space-y-4">
                        {{-- Info Berita --}}
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <p class="text-xs uppercase tracking-wide font-semibold text-gray-700 mb-2">📝 Isi Singkat</p>
                            <p class="text-sm text-gray-700 line-clamp-3">
                                {{ $item->isi ?? 'Tidak ada deskripsi' }}
                            </p>
                        </div>

                        {{-- Meta Info --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                <p class="text-xs font-semibold text-blue-600 mb-1">Dibuat</p>
                                <p class="text-xs font-bold text-gray-900">
                                    {{ $item->created_at ? $item->created_at->format('d/m/y') : '-' }}
                                </p>
                            </div>
                            <div class="bg-cyan-50 p-3 rounded-lg border border-cyan-100">
                                <p class="text-xs font-semibold text-cyan-600 mb-1">Diupdate</p>
                                <p class="text-xs font-bold text-gray-900">
                                    {{ $item->updated_at ? $item->updated_at->format('d/m/y') : '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- FOOTER CARD - AKSI --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-2">
                        <a href="{{ route('berita.show', $item->id) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-black py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <span class="mr-2">👁️</span>
                            <span>Lihat</span>
                        </a>
                        <a href="{{ route('berita.edit', $item->id) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-black py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <span class="mr-2">✏️</span>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" 
                              onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus berita ini?');"
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
                        <p class="text-6xl mb-4">📰</p>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Berita</h3>
                        <p class="text-gray-600 mb-6">Mulai dengan membuat berita baru untuk puskesmas</p>
                        <a href="{{ route('berita.create') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300">
                            <span class="text-2xl mr-3">➕</span>
                            Buat Berita Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $berita->links() }}
        </div>
        @else
        <div class="bg-black rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
            <p class="text-6xl mb-4">📰</p>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Berita</h3>
            <p class="text-gray-600 mb-6">Mulai dengan membuat berita baru untuk puskesmas</p>
            <a href="{{ route('berita.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-black px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Buat Berita Pertama
            </a>
        </div>
        @endif

    </div>
</x-layout4>
