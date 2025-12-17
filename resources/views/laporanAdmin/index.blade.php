<x-layout4>
    {{-- HEADER --}}
    <section class="px-6 md:px-20 pt-12 pb-8 bg-gradient-to-br from-slate-900 via-blue-900 to-blue-800">
        <h1 class="text-5xl font-white text-white mb-2 tracking-tight">📋 Manajemen Rekam Medis</h1>
        <p class="text-blue-100 text-lg">Kelola riwayat kesehatan dan rekam medis seluruh pasien dengan mudah</p>
    </section>

    <div class="px-6 md:px-20 pb-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="mt-8 mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-lg shadow-md" role="alert">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 mb-8">
            {{-- Total Rekam Medis --}}
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-lg border-l-4 border-blue-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-blue-600 font-bold uppercase tracking-wider">Total Rekam Medis</p>
                        <p class="text-4xl font-white text-blue-900 mt-3">{{ $laporan->total() ?? 0 }}</p>
                        <p class="text-xs text-blue-500 mt-2">📋 Pasien Tercatat</p>
                    </div>
                    <div class="text-5xl">📋</div>
                </div>
            </div>

            {{-- Jumlah Pasien Unik --}}
            <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-6 shadow-lg border-l-4 border-indigo-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-indigo-600 font-bold uppercase tracking-wider">Jumlah Pasien</p>
                        <p class="text-4xl font-white text-indigo-900 mt-3">{{ $laporan->groupBy('id_akun')->count() }}</p>
                        <p class="text-xs text-indigo-500 mt-2">👥 Unik</p>
                    </div>
                    <div class="text-5xl">👥</div>
                </div>
            </div>

            {{-- Update Terakhir --}}
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 shadow-lg border-l-4 border-green-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-xs text-green-600 font-bold uppercase tracking-wider">Update Terbaru</p>
                        <p class="text-2xl font-white text-green-900 mt-3">{{ optional($laporan->sortByDesc('updated_at')->first()?->updated_at)->format('d/m/Y') ?? 'Belum ada' }}</p>
                        <p class="text-xs text-green-500 mt-2">⏰ Pembaruan</p>
                    </div>
                    <div class="text-5xl">⏰</div>
                </div>
            </div>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="mb-8">
            <a href="{{ route('laporanAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Rekam Medis Baru
            </a>
        </div>

        {{-- SEARCH + FILTER --}}
        <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="relative">
                <input type="text" placeholder="🔍 Cari Nama Pasien atau NIK..."
                       id="searchInput"
                       class="w-full border-2 border-gray-200 rounded-xl px-5 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all font-semibold" />
            </div>
            <div class="relative">
                <select id="klasterFilter" class="w-full border-2 border-gray-200 rounded-xl px-5 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all font-semibold">
                    <option value="">📋 Semua Klaster</option>
                    <option value="Umum">🩺 Umum</option>
                    <option value="Gigi">🦷 Gigi & Mulut</option>
                    <option value="Bidan">👶 Bidan</option>
                </select>
            </div>
            <div class="text-right">
                <button onclick="document.getElementById('searchInput').value = ''; document.getElementById('klasterFilter').value = ''; location.reload();"
                        class="w-full bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-3 rounded-xl font-semibold transition-all">
                    🔄 Reset Filter
                </button>
            </div>
        </div>

        {{-- REKAM MEDIS CARDS --}}
        @if($laporan->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($laporan as $item)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-l-4 hover:shadow-xl transition-all duration-300" style="border-left-color: #3b82f6;" data-patient-name="{{ $item->akun->nama }}" data-patient-nik="{{ $item->akun->nik }}">
                    {{-- HEADER CARD --}}
                    <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b-2 border-blue-200">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900">👤 {{ $item->akun->nama }}</h3>
                                <p class="text-sm text-gray-600 mt-1">📋 NIK: <span class="font-bold">{{ $item->akun->nik }}</span></p>
                            </div>
                        </div>
                    </div>

                    {{-- BODY CARD --}}
                    <div class="px-6 py-5 space-y-3">
                        {{-- Tanggal Info --}}
                        <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                            <p class="text-xs font-bold text-blue-600 mb-1">📅 Dibuat</p>
                            <p class="text-sm font-semibold text-gray-900">{{ optional($item->created_at)->format('d/m/Y H:i') ?? '-' }}</p>
                        </div>

                        {{-- Update Info --}}
                        <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                            <p class="text-xs font-bold text-green-600 mb-1">✏️ Diperbarui</p>
                            <p class="text-sm font-semibold text-gray-900">{{ optional($item->updated_at)->format('d/m/Y H:i') ?? '-' }}</p>
                        </div>

                        {{-- Status Badge --}}
                        <div class="pt-2">
                            <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-bold">✓ Aktif</span>
                        </div>
                    </div>

                    {{-- FOOTER CARD - AKSI --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
                        <a href="{{ route('laporanAdmin.show', $item->id_akun) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <span class="mr-2">👁️</span>
                            <span>Lihat</span>
                        </a>
                        <a href="{{ route('laporanAdmin.edit', $item->id_akun) }}" 
                           class="flex-1 inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-white py-2.5 rounded-lg font-semibold transition-all duration-200 text-sm">
                            <span class="mr-2">✏️</span>
                            <span>Edit</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
                        <p class="text-6xl mb-4">📋</p>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Rekam Medis</h3>
                        <p class="text-gray-600 mb-6">Mulai dengan menambahkan rekam medis pasien baru</p>
                        <a href="{{ route('laporanAdmin.create') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300">
                            <span class="text-2xl mr-3">➕</span>
                            Tambah Rekam Medis Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8 flex justify-center">
            {{ $laporan->links() }}
        </div>
        @else
        <div class="bg-white rounded-2xl p-12 shadow-lg border-2 border-dashed border-gray-300 text-center">
            <p class="text-6xl mb-4">📋</p>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Rekam Medis</h3>
            <p class="text-gray-600 mb-6">Mulai dengan menambahkan rekam medis pasien baru ke sistem</p>
            <a href="{{ route('laporanAdmin.create') }}" 
               class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl shadow-lg font-semibold transition-all duration-300 hover:shadow-xl">
                <span class="text-2xl mr-3">➕</span>
                Tambah Rekam Medis Pertama
            </a>
        </div>
        @endif
    </div>

    {{-- FILTER SCRIPT --}}
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function(e) {
            const searchValue = this.value.toLowerCase();
            const cards = document.querySelectorAll('[data-patient-name]');
            
            cards.forEach(card => {
                const name = card.getAttribute('data-patient-name').toLowerCase();
                const nik = card.getAttribute('data-patient-nik').toLowerCase();
                
                if (name.includes(searchValue) || nik.includes(searchValue)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</x-layout4>
