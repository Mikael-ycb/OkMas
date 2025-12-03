<x-layout4>
    {{-- HEADER SECTION --}}
    <section class="px-6 md:px-20 pt-12 pb-8 bg-gradient-to-br from-slate-900 via-blue-900 to-blue-800">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-5xl font-black text-black mb-2 tracking-tight">🏥 Dashboard Admin</h1>
                <p class="text-blue-600 text-lg">Kelola sistem kesehatan puskesmas dengan mudah dan efisien</p>
            </div>
            <div class="text-right">
                <p class="text-blue-200 text-sm font-semibold">{{ now()->format('d M Y') }}</p>
                <p class="text-blue-100 text-xs">{{ now()->format('H:i') }}</p>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <div class="px-6 md:px-20 py-12 bg-gradient-to-b from-gray-50 to-black min-h-screen">

        {{-- TOP STATS ROW --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            {{-- Stat 1: Semua Dokter --}}
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-lg border-l-4 border-blue-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-blue-600 font-bold uppercase tracking-wider">Semua Dokter</p>
                        <h3 class="text-4xl font-black text-blue-900 mt-3">{{ $totalDokter ?? 0 }}</h3>
                        <p class="text-xs text-blue-500 mt-2">📈 Aktif melayani</p>
                    </div>
                    <div class="text-5xl">👨‍⚕️</div>
                </div>
            </div>

            {{-- Stat 2: Janji Temu --}}
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 shadow-lg border-l-4 border-orange-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-orange-600 font-bold uppercase tracking-wider">Janji Temu</p>
                        <h3 class="text-4xl font-black text-orange-900 mt-3">{{ $totalJanjiTemu ?? '0' }}</h3>
                        <p class="text-xs text-orange-500 mt-2">📅 Minggu ini</p>
                    </div>
                    <div class="text-5xl">📋</div>
                </div>
            </div>

            {{-- Stat 3: Total Pasien Aktif --}}
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 shadow-lg border-l-4 border-green-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-green-600 font-bold uppercase tracking-wider">Pasien Aktif</p>
                        <h3 class="text-4xl font-black text-green-900 mt-3">{{ $totalPasien ?? 0 }}</h3>
                        <p class="text-xs text-green-500 mt-2">👥 Terdaftar</p>
                    </div>
                    <div class="text-5xl">🏥</div>
                </div>
            </div>

            {{-- Stat 4: Pengunjung Bulan Ini --}}
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 shadow-lg border-l-4 border-purple-600 hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-purple-600 font-bold uppercase tracking-wider">Total Kunjungan</p>
                        <h3 class="text-4xl font-black text-purple-900 mt-3">{{ $totalPengunjung ?? '0' }}</h3>
                        <p class="text-xs text-purple-500 mt-2">📊 Bulan ini</p>
                    </div>
                    <div class="text-5xl">📈</div>
                </div>
            </div>

        </div>

        {{-- KLASTER BREAKDOWN SECTION --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
            
            {{-- Klaster: Umum (General) --}}
            <div class="bg-black rounded-2xl shadow-lg overflow-hidden border-t-4 border-blue-500 hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 text-black">
                    <h3 class="text-xl font-bold">🩺 Klaster Umum</h3>
                    <p class="text-black-100 text-sm">Layanan Kesehatan Umum</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                            <span class="text-gray-600 font-semibold">Dokter</span>
                            <span class="text-2xl font-black text-blue-600">{{ $dokterUmum ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                            <span class="text-gray-600 font-semibold">Janji Temu Hari Ini</span>
                            <span class="text-2xl font-black text-blue-600">{{ $janjiTemuUmum ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-semibold">Periksa Aktif</span>
                            <span class="text-2xl font-black text-blue-600">{{ $periksaUmum ?? 0 }}</span>
                        </div>
                    </div>
                    <a href="{{ route('periksa.index', ['klaster' => 'Umum']) }}" class="mt-4 block w-full bg-blue-500 hover:bg-blue-600 text-black py-3 rounded-lg font-semibold transition text-center">
                        Lihat Detail →
                    </a>
                </div>
            </div>

            {{-- Klaster: Gigi dan Mulut (Dental) --}}
            <div class="bg-black rounded-2xl shadow-lg overflow-hidden border-t-4 border-pink-500 hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-pink-500 to-pink-600 px-6 py-4 text-black">
                    <h3 class="text-xl font-bold">🦷 Klaster Gigi & Mulut</h3>
                    <p class="text-pink-100 text-sm">Layanan Kesehatan Gigi</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                            <span class="text-gray-600 font-semibold">Dokter</span>
                            <span class="text-2xl font-black text-pink-600">{{ $dokterGigi ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                            <span class="text-gray-600 font-semibold">Janji Temu Hari Ini</span>
                            <span class="text-2xl font-black text-pink-600">{{ $janjiTemuGigi ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-semibold">Periksa Aktif</span>
                            <span class="text-2xl font-black text-pink-600">{{ $periksaGigi ?? 0 }}</span>
                        </div>
                    </div>
                    <a href="{{ route('periksa.index', ['klaster' => 'Gigi dan Mulut']) }}" class="mt-4 block w-full bg-pink-500 hover:bg-pink-600 text-black py-3 rounded-lg font-semibold transition text-center">
                        Lihat Detail →
                    </a>
                </div>
            </div>

            {{-- Klaster: Bidan (Midwifery) --}}
            <div class="bg-black rounded-2xl shadow-lg overflow-hidden border-t-4 border-rose-500 hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-rose-500 to-rose-600 px-6 py-4 text-black">
                    <h3 class="text-xl font-bold">👶 Klaster Bidan</h3>
                    <p class="text-rose-100 text-sm">Layanan Ibu dan Anak</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                            <span class="text-gray-600 font-semibold">Bidan</span>
                            <span class="text-2xl font-black text-rose-600">{{ $dokterBidan ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                            <span class="text-gray-600 font-semibold">Janji Temu Hari Ini</span>
                            <span class="text-2xl font-black text-rose-600">{{ $janjiTemuBidan ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 font-semibold">Periksa Aktif</span>
                            <span class="text-2xl font-black text-rose-600">{{ $perikasaBidan ?? 0 }}</span>
                        </div>
                    </div>
                    <a href="{{ route('periksa.index', ['klaster' => 'Bidan']) }}" class="mt-4 block w-full bg-rose-500 hover:bg-rose-600 text-black py-3 rounded-lg font-semibold transition text-center">
                        Lihat Detail →
                    </a>
                </div>
            </div>

        </div>

        {{-- QUICK ACTIONS SECTION --}}
        <div class="bg-black rounded-2xl p-8 shadow-lg mb-10 border-t-4 border-indigo-500">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">⚡ Aksi Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('akunPasienAdmin.create') }}" class="bg-gradient-to-br from-blue-500 to-blue-600 hover:shadow-lg text-black p-6 rounded-xl transition-all duration-300 text-center">
                    <div class="text-4xl mb-2">➕</div>
                    <h3 class="font-bold">Tambah Pasien</h3>
                    <p class="text-black-100 text-sm">Registrasi akun baru</p>
                </a>
                <a href="{{ route('berita.create') }}" class="bg-gradient-to-br from-green-500 to-green-600 hover:shadow-lg text-black p-6 rounded-xl transition-all duration-300 text-center">
                    <div class="text-4xl mb-2">📰</div>
                    <h3 class="font-bold">Buat Berita</h3>
                    <p class="text-green-100 text-sm">Publikasikan informasi</p>
                </a>
                <a href="{{ route('obatAdmin.create') }}" class="bg-gradient-to-br from-purple-500 to-purple-600 hover:shadow-lg text-black p-6 rounded-xl transition-all duration-300 text-center">
                    <div class="text-4xl mb-2">💊</div>
                    <h3 class="font-bold">Tambah Obat</h3>
                    <p class="text-purple-100 text-sm">Update inventori</p>
                </a>
                <a href="{{ route('resep.create') }}" class="bg-gradient-to-br from-orange-500 to-orange-600 hover:shadow-lg text-black p-6 rounded-xl transition-all duration-300 text-center">
                    <div class="text-4xl mb-2">📋</div>
                    <h3 class="font-bold">Buat Resep</h3>
                    <p class="text-orange-100 text-sm">Resep untuk pasien</p>
                </a>
            </div>
        </div>

        {{-- PATIENT OVERVIEW SECTION --}}
        <div class="bg-black rounded-2xl p-8 shadow-lg border-t-4 border-cyan-500">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-slate-900">📋 Daftar Janji Temu Terbaru</h2>
                <a href="{{ route('periksa.index') }}" class="bg-cyan-100 text-cyan-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-cyan-200 transition">
                    Lihat Semua →
                </a>
            </div>

            {{-- Patient Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($janjiTemuTerbaru ?? [] as $jt)
                    <div class="border rounded-xl p-5 bg-gradient-to-br from-gray-50 to-black hover:shadow-lg transition">
                        
                        {{-- Header dengan ID dan Status Badge --}}
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="text-lg font-bold text-gray-800">
                                <span class="text-blue-600">📌</span> #{{ $jt->id ?? 'N/A' }}
                            </h4>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">
                                ✓ Terkonfirmasi
                            </span>
                        </div>

                        {{-- Patient Info --}}
                        <div class="space-y-3 mb-4">
                            <div>
                                <p class="text-xs text-gray-500">👤 Nama Pasien</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $jt->akun->nama ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-500">📱 Nomor</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $jt->akun->nomor_hp ?? '-' }}</p>
                            </div>

                            {{-- Tanggal & Waktu --}}
                            <div>
                                <p class="text-xs text-gray-500">📅 Tanggal Janji</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $jt->tanggal->tanggal ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-500">⏰ Jam</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $jt->tanggal->jam_awal ?? '-' }} - {{ $jt->tanggal->jam_akhir ?? '-' }}
                                </p>
                            </div>

                            {{-- Dokter --}}
                            <div>
                                <p class="text-xs text-gray-500">👨‍⚕️ Dokter</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $jt->dokter->nama_dokter ?? '-' }}
                                </p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex gap-2 mt-5">
                            <a href="{{ route('periksa.index') }}"
                                class="flex-1 text-center bg-gray-500 hover:bg-gray-600 text-black px-3 py-2 rounded-lg text-sm font-semibold transition">
                                👁️ Lihat
                            </a>
                            <a href="{{ route('periksa.formLaporan', $jt->periksa->id ?? 0) }}"
                                class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-black px-3 py-2 rounded-lg text-sm font-semibold transition">
                                📝 Laporan
                            </a>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 text-lg">📭 Tidak ada janji temu terbaru</p>
                    </div>
                @endforelse

            </div>

        </div>

        {{-- BOTTOM SECTION: CHARTS & DATA --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- Chart 1: Overview --}}
            <div class="bg-black rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-6">📊 Overview</h3>
                <div class="flex items-center justify-center">
                    <div class="text-center">
                        <p class="text-sm text-gray-500">Total Patients</p>
                        <p class="text-4xl font-bold text-blue-600 mt-2">{{ $totalPasien ?? 0 }}</p>
                        <p class="text-xs text-gray-400 mt-2">Inpatients • Outpatients</p>
                    </div>
                </div>
                <div class="mt-8 space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Inpatients</span>
                        <span class="text-sm font-semibold">35%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: 35%"></div>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <span class="text-sm text-gray-600">Outpatients</span>
                        <span class="text-sm font-semibold">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
            </div>

            {{-- Chart 2: Patients Visit --}}
            <div class="bg-black rounded-2xl p-8 shadow-lg">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-800">👥 Pengunjung Pasien</h3>
                    <select class="text-sm bg-gray-100 border border-gray-300 px-3 py-1 rounded hover:bg-gray-200">
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>Yearly</option>
                    </select>
                </div>

                {{-- Donut Chart Placeholder --}}
                <div class="flex justify-center items-center h-40">
                    <div class="text-center">
                        <div class="w-32 h-32 rounded-full border-8 border-yellow-400 border-r-blue-400 border-b-green-400 mx-auto"></div>
                        <p class="text-xs text-gray-500 mt-4">Distribusi Kunjungan</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- FEATURES SECTION --}}
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            {{-- Feature 1: Kelola Pasien --}}
            <a href="{{ route('akunPasienAdmin.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-blue-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">👤</div>
                <h4 class="font-bold text-gray-800 mb-2">Kelola Pasien</h4>
                <p class="text-sm text-gray-600">Manage data pasien dan informasi kesehatan</p>
                <div class="text-blue-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 2: Laporan Medis --}}
            <a href="{{ route('laporanAdmin.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-green-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">📋</div>
                <h4 class="font-bold text-gray-800 mb-2">Laporan Medis</h4>
                <p class="text-sm text-gray-600">Buat dan kelola laporan pemeriksaan pasien</p>
                <div class="text-green-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 3: Resep Obat --}}
            <a href="{{ route('resep.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-orange-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">💊</div>
                <h4 class="font-bold text-gray-800 mb-2">Resep Obat</h4>
                <p class="text-sm text-gray-600">Kelola resep obat untuk pasien</p>
                <div class="text-orange-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 4: Data Obat --}}
            <a href="{{ route('obatAdmin.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-purple-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">🔬</div>
                <h4 class="font-bold text-gray-800 mb-2">Data Obat</h4>
                <p class="text-sm text-gray-600">Manajemen stok dan data obat farmasi</p>
                <div class="text-purple-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 5: Jadwal & Klaster --}}
            <a href="{{ route('klaster.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-red-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">🏥</div>
                <h4 class="font-bold text-gray-800 mb-2">Klaster</h4>
                <p class="text-sm text-gray-600">Kelola klaster pemeriksaan dan jadwal</p>
                <div class="text-red-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 6: Data Dokter --}}
            <a href="{{ route('dokterAdmin.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-cyan-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">👨‍⚕️</div>
                <h4 class="font-bold text-gray-800 mb-2">Data Dokter</h4>
                <p class="text-sm text-gray-600">Manajemen data dokter dan spesialisasi</p>
                <div class="text-cyan-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 7: Berita & Info --}}
            <a href="{{ route('berita.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-pink-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">📰</div>
                <h4 class="font-bold text-gray-800 mb-2">Berita & Info</h4>
                <p class="text-sm text-gray-600">Kelola berita dan informasi untuk pasien</p>
                <div class="text-pink-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 8: Kontak & Aduan --}}
            <a href="{{ route('kontak.index') }}"
                class="bg-black rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-indigo-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">💬</div>
                <h4 class="font-bold text-gray-800 mb-2">Kontak & Aduan</h4>
                <p class="text-sm text-gray-600">Kelola pesan dan aduan dari pasien</p>
                <div class="text-indigo-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

        </div>

    </div>

</x-layout4>
