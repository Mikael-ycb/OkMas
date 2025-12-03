<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-8 bg-gradient-to-br from-slate-900 via-purple-900 to-purple-800">
        <h1 class="text-5xl font-black text-white mb-2 tracking-tight">👨‍⚕️ Manajemen Data Dokter</h1>
        <p class="text-purple-100 text-lg">Kelola semua informasi dokter dan alokasi klaster layanan kesehatan</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mb-8">
            {{-- Total Dokter --}}
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 shadow-lg border-l-4 border-purple-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-purple-600 font-bold uppercase tracking-wider">Total Dokter</p>
                        <p class="text-4xl font-black text-purple-900 mt-3">{{ $dokter->total() ?? 0 }}</p>
                        <p class="text-xs text-purple-500 mt-2">👨‍⚕️ Aktif</p>
                    </div>
                    <div class="text-5xl">👨‍⚕️</div>
                </div>
            </div>

            {{-- Total Klaster --}}
            <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-6 shadow-lg border-l-4 border-indigo-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-indigo-600 font-bold uppercase tracking-wider">Kategori Klaster</p>
                        <p class="text-4xl font-black text-indigo-900 mt-3">{{ $dokter->groupBy('klaster_id')->count() }}</p>
                        <p class="text-xs text-indigo-500 mt-2">🏥 Layanan</p>
                    </div>
                    <div class="text-5xl">🏥</div>
                </div>
            </div>

            {{-- Rata-rata per Klaster --}}
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 rounded-2xl p-6 shadow-lg border-l-4 border-pink-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-pink-600 font-bold uppercase tracking-wider">Rata-rata</p>
                        <p class="text-4xl font-black text-pink-900 mt-3">{{ $dokter->groupBy('klaster_id')->count() > 0 ? round($dokter->count() / $dokter->groupBy('klaster_id')->count(), 1) : 0 }}</p>
                        <p class="text-xs text-pink-500 mt-2">📊 Per Klaster</p>
                    </div>
                    <div class="text-5xl">📊</div>
                </div>
            </div>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="mb-8">
            <a href="{{ route('dokterAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Dokter Baru
            </a>
        </div>

        {{-- DAFTAR DOKTER - CARDS VIEW --}}
        @if($dokter->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($dokter as $item)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-l-4 hover:shadow-xl transition-all duration-300"
                     @if($item->klaster->nama == 'Umum') style="border-left-color: #2563eb;" @elseif($item->klaster->nama == 'Gigi dan Mulut') style="border-left-color: #ec4899;" @elseif($item->klaster->nama == 'Bidan') style="border-left-color: #f43f5e;" @endif>
                    {{-- HEADER CARD --}}
                    <div class="px-6 py-4 border-b-2"
                         @if($item->klaster->nama == 'Umum') style="background: linear-gradient(135deg, #dbeafe, #bfdbfe); border-bottom-color: #2563eb;" @elseif($item->klaster->nama == 'Gigi dan Mulut') style="background: linear-gradient(135deg, #fce7f3, #fbcfe8); border-bottom-color: #ec4899;" @elseif($item->klaster->nama == 'Bidan') style="background: linear-gradient(135deg, #ffe4e6, #fecdd3); border-bottom-color: #f43f5e;" @endif>
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900">
                                    👨‍⚕️ {{ $item->nama_dokter }}
                                </h3>
                                <div class="flex items-center gap-2 mt-2">
                                    @if($item->klaster->nama == 'Umum')
                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">🩺 Umum</span>
                                    @elseif($item->klaster->nama == 'Gigi dan Mulut')
                                        <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-xs font-bold">🦷 Gigi</span>
                                    @elseif($item->klaster->nama == 'Bidan')
                                        <span class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-xs font-bold">👶 Bidan</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">{{ $item->klaster->nama }}</span>
                                    @endif
                                </div>
                            </div>
                            @if($item->spesialisasi)
                            <div class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap">
                                🎓 {{ $item->spesialisasi }}
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="px-6 py-5 space-y-4">
                        {{-- Info Klaster --}}
                        <div class="p-4 rounded-xl border-2"
                             @if($item->klaster->nama == 'Umum') style="background-color: #dbeafe; border-color: #2563eb;" @elseif($item->klaster->nama == 'Gigi dan Mulut') style="background-color: #fce7f3; border-color: #ec4899;" @elseif($item->klaster->nama == 'Bidan') style="background-color: #ffe4e6; border-color: #f43f5e;" @endif>
                            <p class="text-xs uppercase tracking-wide font-bold mb-2" 
                               @if($item->klaster->nama == 'Umum') style="color: #1e40af;" @elseif($item->klaster->nama == 'Gigi dan Mulut') style="color: #be185d;" @elseif($item->klaster->nama == 'Bidan') style="color: #831843;" @endif>
                                🏥 Klaster / Departemen
                            </p>
                            <p class="text-lg font-black text-gray-900">
                                @if($item->klaster->nama == 'Umum')
                                    🩺 Umum
                                @elseif($item->klaster->nama == 'Gigi dan Mulut')
                                    🦷 Gigi & Mulut
                                @elseif($item->klaster->nama == 'Bidan')
                                    👶 Bidan
                                @else
                                    {{ $item->klaster->nama }}
                                @endif
                            </p>
                        </div>

                        {{-- Info Dokter Tambahan --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                                <p class="text-xs font-bold text-blue-600 mb-1">📋 Tipe</p>
                                <p class="text-sm font-bold text-gray-900">
                                    @if($item->spesialisasi)
                                        🎓 Spesialis
                                    @else
                                        👨‍⚕️ Umum
                                    @endif
                                </p>
                            </div>
                            <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                                <p class="text-xs font-bold text-green-600 mb-1">✓ Status</p>
                                <p class="text-sm font-bold text-green-700">Aktif</p>
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
