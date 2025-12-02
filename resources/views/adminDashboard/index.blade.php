<x-layout4>
    {{-- HEADER SECTION --}}
    <section class="px-6 md:px-20 pt-12 pb-6 bg-gradient-to-r from-blue-900 to-blue-800">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-white mb-2">Dashboard Admin</h1>
                <p class="text-blue-100">Selamat datang kembali! Berikut ringkasan data sistem kesehatan.</p>
            </div>
            <div class="text-right">
                <p class="text-blue-100 text-sm">September 2025</p>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <div class="px-6 md:px-20 py-12 bg-gray-50 min-h-screen">

        {{-- TOP STATS ROW --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            {{-- Stat 1: Semua Dokter --}}
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">Semua Dokter</p>
                        <h3 class="text-3xl font-bold text-blue-900 mt-2">{{ $totalDokter ?? 0 }}</h3>
                        <p class="text-xs text-gray-400 mt-1">📈 Meningkat</p>
                    </div>
                    <div class="text-4xl">👨‍⚕️</div>
                </div>
            </div>

            {{-- Stat 2: Janji Temu --}}
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-orange-500 hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">Janji Temu</p>
                        <h3 class="text-3xl font-bold text-orange-600 mt-2">{{ $totalJanjiTemu ?? '0' }}</h3>
                        <p class="text-xs text-gray-400 mt-1">Kunjungan terakhir 7 hari</p>
                    </div>
                    <div class="text-4xl">📅</div>
                </div>
            </div>

            {{-- Stat 3: Total Kamar --}}
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-green-500 hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">Total Kamar</p>
                        <h3 class="text-3xl font-bold text-green-600 mt-2">{{ $totalKamar ?? 0 }}</h3>
                        <p class="text-xs text-gray-400 mt-1">
                            <span class="text-white bg-gray-700 px-2 py-1 rounded">Pribadi: {{ $kamarPribadi ?? 0 }}</span>
                        </p>
                    </div>
                    <div class="text-4xl">🏥</div>
                </div>
            </div>

            {{-- Stat 4: Pengunjung --}}
            <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-purple-500 hover:shadow-xl transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">Pengunjung</p>
                        <h3 class="text-3xl font-bold text-purple-600 mt-2">{{ $totalPengunjung ?? '0' }}</h3>
                        <p class="text-xs text-gray-400 mt-1">Kunjungan terakhir 7 hari</p>
                    </div>
                    <div class="text-4xl">👥</div>
                </div>
            </div>

        </div>

        {{-- PATIENT OVERVIEW SECTION --}}
        <div class="bg-white rounded-2xl p-8 shadow-lg mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-blue-900">📋 Daftar Janji Temu Terbaru</h2>
                <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-lg text-sm font-semibold">
                    Status: In Queue
                </span>
            </div>

            {{-- Patient Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($janjiTemuTerbaru ?? [] as $jt)
                    <div class="border rounded-xl p-5 bg-gradient-to-br from-gray-50 to-white hover:shadow-lg transition">
                        
                        {{-- Header dengan ID dan Status Badge --}}
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="text-lg font-bold text-gray-800">
                                <span class="text-blue-600">📌</span> #{{ $jt?->id ?? 'N/A' }}
                            </h4>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">
                                ✓ Terkonfirmasi
                            </span>
                        </div>

                        {{-- Patient Info --}}
                        <div class="space-y-3 mb-4">
                            <div>
                                <p class="text-xs text-gray-500">👤 Nama Pasien</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $jt?->akun?->nama ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-500">📱 Nomor</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $jt?->akun?->nomor_hp ?? '-' }}</p>
                            </div>

                            {{-- Tanggal & Waktu --}}
                            <div>
                                <p class="text-xs text-gray-500">📅 Tanggal Janji</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $jt?->tanggal?->tanggal ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-500">⏰ Jam</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $jt?->tanggal?->jam_awal ?? '-' }} - {{ $jt?->tanggal?->jam_akhir ?? '-' }}
                                </p>
                            </div>

                            {{-- Dokter --}}
                            <div>
                                <p class="text-xs text-gray-500">👨‍⚕️ Dokter</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $jt?->dokter?->nama_dokter ?? '-' }}
                                </p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex gap-2 mt-5">
                            <a href="{{ route('laporanAdmin.create', ['id_akun' => $jt?->id_akun]) }}"
                                class="flex-1 text-center bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold transition">
                                ✗ Decline
                            </a>
                            <a href="{{ route('laporanAdmin.create', ['id_akun' => $jt?->id_akun]) }}"
                                class="flex-1 text-center bg-orange-500 hover:bg-orange-600 text-white px-3 py-2 rounded-lg text-sm font-semibold transition">
                                ✓ Approve
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
            <div class="bg-white rounded-2xl p-8 shadow-lg">
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
            <div class="bg-white rounded-2xl p-8 shadow-lg">
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
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-blue-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">👤</div>
                <h4 class="font-bold text-gray-800 mb-2">Kelola Pasien</h4>
                <p class="text-sm text-gray-600">Manage data pasien dan informasi kesehatan</p>
                <div class="text-blue-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 2: Laporan Medis --}}
            <a href="{{ route('laporanAdmin.index') }}"
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-green-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">📋</div>
                <h4 class="font-bold text-gray-800 mb-2">Laporan Medis</h4>
                <p class="text-sm text-gray-600">Buat dan kelola laporan pemeriksaan pasien</p>
                <div class="text-green-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 3: Resep Obat --}}
            <a href="{{ route('resep.index') }}"
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-orange-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">💊</div>
                <h4 class="font-bold text-gray-800 mb-2">Resep Obat</h4>
                <p class="text-sm text-gray-600">Kelola resep obat untuk pasien</p>
                <div class="text-orange-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 4: Data Obat --}}
            <a href="{{ route('obatAdmin.index') }}"
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-purple-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">🔬</div>
                <h4 class="font-bold text-gray-800 mb-2">Data Obat</h4>
                <p class="text-sm text-gray-600">Manajemen stok dan data obat farmasi</p>
                <div class="text-purple-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 5: Jadwal & Klaster --}}
            <a href="{{ route('klaster.index') }}"
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-red-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">🏥</div>
                <h4 class="font-bold text-gray-800 mb-2">Klaster</h4>
                <p class="text-sm text-gray-600">Kelola klaster pemeriksaan dan jadwal</p>
                <div class="text-red-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 6: Data Dokter --}}
            <a href="{{ route('dokterAdmin.index') }}"
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-cyan-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">👨‍⚕️</div>
                <h4 class="font-bold text-gray-800 mb-2">Data Dokter</h4>
                <p class="text-sm text-gray-600">Manajemen data dokter dan spesialisasi</p>
                <div class="text-cyan-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 7: Berita & Info --}}
            <a href="{{ route('berita.index') }}"
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-pink-500 transition group">
                <div class="text-4xl mb-3 group-hover:scale-110 transition">📰</div>
                <h4 class="font-bold text-gray-800 mb-2">Berita & Info</h4>
                <p class="text-sm text-gray-600">Kelola berita dan informasi untuk pasien</p>
                <div class="text-pink-600 text-sm font-semibold mt-3 group-hover:translate-x-1 transition">
                    Buka → 
                </div>
            </a>

            {{-- Feature 8: Kontak & Aduan --}}
            <a href="{{ route('kontak.index') }}"
                class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl border-t-4 border-indigo-500 transition group">
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
