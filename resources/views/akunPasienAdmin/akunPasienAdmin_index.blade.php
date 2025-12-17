<x-layout4>
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gradient-to-r from-cyan-600 to-blue-600">
        <h1 class="text-4xl font-bold text-white">👥 Manajemen Akun Pasien</h1>
        <p class="text-cyan-100 mt-2">Kelola semua akun pasien dalam sistem</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gray-50 min-h-screen">
        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mb-8">
            {{-- Total Pasien --}}
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Total Pasien</p>
                        <p class="text-4xl font-bold mt-2">{{ $akun->total() ?? 0 }}</p>
                    </div>
                    <div class="text-6xl opacity-30">👥</div>
                </div>
            </div>

            {{-- Total dengan Role Pasien --}}
            <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Role Pasien</p>
                        <p class="text-4xl font-bold mt-2">{{ $akun->where('role', 'pasien')->count() }}</p>
                    </div>
                    <div class="text-6xl opacity-30">🏥</div>
                </div>
            </div>

            {{-- Total Admin/Staff --}}
            <div class="bg-gradient-to-br from-amber-600 to-amber-700 rounded-2xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm uppercase tracking-wide opacity-90">Admin & Staff</p>
                        <p class="text-4xl font-bold mt-2">{{ $akun->whereIn('role', ['admin', 'dokter'])->count() }}</p>
                    </div>
                    <div class="text-6xl opacity-30">👨‍💼</div>
                </div>
            </div>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="mb-8">
            <a href="{{ route('akunPasienAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Akun Baru
            </a>
        </div>

        {{-- DAFTAR AKUN - CARDS VIEW --}}
        @if($akun->isNotEmpty())
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse($akun as $item)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-l-4 border-cyan-500 hover:shadow-xl transition-all duration-300">
                    {{-- HEADER CARD --}}
                    <div class="bg-gradient-to-r from-cyan-50 to-blue-50 px-6 py-4 border-b border-cyan-100">
                        <div class="flex justify-between items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900">
                                    👤 {{ $item->nama }}
                                </h3>
                                <p class="text-sm text-gray-600 mt-1">
                                    ID: <span class="font-mono font-semibold text-cyan-600">{{ str_pad($item->id_akun, 3, '0', STR_PAD_LEFT) }}</span>
                                </p>
                            </div>
                            <div>
                                @if($item->role === 'pasien')
                                    <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-bold">🏥 PASIEN</span>
                                @elseif($item->role === 'admin')
                                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full text-xs font-bold">🔐 ADMIN</span>
                                @else
                                    <span class="inline-block bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-xs font-bold">⚕️ {{ strtoupper($item->role) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="px-6 py-5 space-y-4">
                        {{-- Info Grid --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-blue-600 mb-1">NIK</p>
                                <p class="font-mono text-sm font-semibold text-gray-900">{{ $item->nik }}</p>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-xl border border-purple-100">
                                <p class="text-xs uppercase tracking-wide font-semibold text-purple-600 mb-1">Username</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $item->username }}</p>
                            </div>
                        </div>

                        {{-- Telepon --}}
                        <div class="bg-green-50 p-4 rounded-xl border border-green-100">
                            <p class="text-xs uppercase tracking-wide font-semibold text-green-600 mb-1">📞 No. Telepon</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $item->no_telepon ?? '(Tidak diisi)' }}</p>
                        </div>
                    </div>

                    {{-- FOOTER CARD - AKSI --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
                        <a href="{{ route('akunPasienAdmin.edit', $item->id_akun) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-white py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <span class="mr-2">✏️</span>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('akunPasienAdmin.destroy', $item->id_akun) }}" method="POST" 
                              onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus akun pasien ini?');"
                              class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-white py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                                <span class="mr-2">🗑️</span>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
                        <p class="text-6xl mb-4">👥</p>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Akun Pasien</h3>
                        <p class="text-gray-600 mb-6">Mulai dengan membuat akun pasien baru</p>
                        <a href="{{ route('akunPasienAdmin.create') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300">
                            <span class="text-2xl mr-3">➕</span>
                            Buat Akun Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8">
            {{ $akun->links() }}
        </div>
        @else
        <div class="bg-white rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
            <p class="text-6xl mb-4">👥</p>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Akun Pasien</h3>
            <p class="text-gray-600 mb-6">Mulai dengan membuat akun pasien baru untuk sistem</p>
            <a href="{{ route('akunPasienAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Buat Akun Pertama
            </a>
        </div>
        @endif

    </div>
</x-layout4>
