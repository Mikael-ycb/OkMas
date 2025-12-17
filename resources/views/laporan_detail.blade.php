<x-layout>

    <section class="px-6 md:px-10 py-10 bg-gray-50 min-h-screen">
        
        <div class="max-w-4xl mx-auto">
            {{-- Back Button --}}
            <a href="{{ route('laporan') }}"
               class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-8 font-semibold group">
                <span class="group-hover:-translate-x-1 transition-transform">←</span>
                <span class="ml-2">Kembali ke Riwayat</span>
            </a>

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-blue-900 mb-2">📋 Detail Laporan Pemeriksaan</h1>
                <p class="text-gray-600">Informasi lengkap hasil pemeriksaan Anda</p>
            </div>

            {{-- Info Pasien (Card Header) --}}
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 rounded-2xl p-8 text-black mb-6 shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-sm opacity-80 mb-1 text-black">👤 Nama Pasien</p>
                        <p class="text-3xl font-bold text-black">{{ $laporan->nama_pasien }}</p>
                    </div>
                    <div>
                        <p class="text-sm opacity-80 mb-1 text-black">🆔 NIK</p>
                        <p class="text-2xl font-bold font-mono text-black">{{ $laporan->nik }}</p>
                    </div>
                </div>
            </div>

            {{-- Info Pemeriksaan --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
                <h2 class="text-2xl font-bold text-blue-900 mb-6">🏥 Informasi Pemeriksaan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="pb-6 border-b md:border-b-0 md:border-r border-gray-200">
                        <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-2">Tanggal Pemeriksaan</p>
                        <p class="text-2xl font-bold text-gray-800">
                            📅 {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-2">Jenis Pemeriksaan</p>
                        <p class="text-2xl font-bold text-gray-800">
                            🔬 {{ $laporan->jenis_pemeriksaan }}
                        </p>
                    </div>
                </div>
                
                {{-- Dokter & Keluhan --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8 pt-8 border-t border-gray-200">
                    <div class="pb-6 border-b md:border-b-0 md:border-r border-gray-200">
                        <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-2">👨‍⚕️ Dokter</p>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $laporan->janjiTemu?->dokter?->nama_dokter ?? 'Tidak tersedia' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm uppercase tracking-wider font-semibold text-gray-500 mb-2">Keluhan Utama</p>
                        <p class="text-lg font-semibold text-gray-800">
                            "{{ $laporan->janjiTemu?->keluhan ?? 'Tidak tersedia' }}"
                        </p>
                    </div>
                </div>
            </div>

            {{-- Diagnosa & Tekanan Darah --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h3 class="text-xl font-bold text-red-600 mb-4">🚨 Diagnosa</h3>
                    <div class="bg-red-50 p-6 rounded-lg border-l-4 border-red-500">
                        <p class="text-gray-800 leading-relaxed">
                            {{ $laporan->diagnosa ?? 'Tidak tersedia' }}
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h3 class="text-xl font-bold text-blue-600 mb-4">❤️ Tekanan Darah</h3>
                    <div class="bg-blue-50 p-6 rounded-lg border-l-4 border-blue-500">
                        <p class="text-2xl font-bold text-blue-900">
                            {{ $laporan->tekanan_darah ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Anamnesis --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">📝 Anamnesis (Riwayat Keluhan)</h3>
                <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-gray-400">
                    <p class="text-gray-700 leading-relaxed">
                        {{ $laporan->anamnesis ?? 'Tidak ada informasi' }}
                    </p>
                </div>
            </div>

            {{-- Hasil Pemeriksaan --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
                <h3 class="text-xl font-bold text-green-600 mb-4">✓ Hasil Pemeriksaan</h3>
                <div class="bg-green-50 p-6 rounded-lg border-l-4 border-green-500">
                    <p class="text-gray-700 leading-relaxed">
                        {{ $laporan->hasil_pemeriksaan ?? 'Tidak ada informasi' }}
                    </p>
                </div>
            </div>

            {{-- Saran dari Dokter --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
                <h3 class="text-xl font-bold text-purple-600 mb-4">💡 Saran dari Dokter</h3>
                <div class="bg-purple-50 p-6 rounded-lg border-l-4 border-purple-500">
                    <p class="text-gray-700 leading-relaxed italic">
                        {{ $laporan->saran ?? 'Tidak ada saran tambahan' }}
                    </p>
                </div>
            </div>

            {{-- Riwayat Penyakit & Kebiasaan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                @if($laporan->riwayat_penyakit_sekarang)
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h3 class="text-lg font-bold text-orange-600 mb-4">📊 Riwayat Penyakit Sekarang</h3>
                    <div class="bg-orange-50 p-6 rounded-lg border-l-4 border-orange-500">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $laporan->riwayat_penyakit_sekarang }}
                        </p>
                    </div>
                </div>
                @endif

                @if($laporan->riwayat_penyakit_dahulu)
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h3 class="text-lg font-bold text-indigo-600 mb-4">📜 Riwayat Penyakit Dahulu</h3>
                    <div class="bg-indigo-50 p-6 rounded-lg border-l-4 border-indigo-500">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $laporan->riwayat_penyakit_dahulu }}
                        </p>
                    </div>
                </div>
                @endif
            </div>

            {{-- Riwayat Keluarga & Kebiasaan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                @if($laporan->riwayat_penyakit_keluarga)
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h3 class="text-lg font-bold text-pink-600 mb-4">👨‍👩‍👧 Riwayat Penyakit Keluarga</h3>
                    <div class="bg-pink-50 p-6 rounded-lg border-l-4 border-pink-500">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $laporan->riwayat_penyakit_keluarga }}
                        </p>
                    </div>
                </div>
                @endif

                @if($laporan->riwayat_kebiasaan)
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h3 class="text-lg font-bold text-cyan-600 mb-4">🚬 Riwayat Kebiasaan</h3>
                    <div class="bg-cyan-50 p-6 rounded-lg border-l-4 border-cyan-500">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $laporan->riwayat_kebiasaan }}
                        </p>
                    </div>
                </div>
                @endif
            </div>

            {{-- Anamnesis Organ --}}
            @if($laporan->anamnesis_organ)
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 mb-6">
                <h3 class="text-lg font-bold text-lime-600 mb-4">🫀 Anamnesis Organ Sistematik</h3>
                <div class="bg-lime-50 p-6 rounded-lg border-l-4 border-lime-500">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $laporan->anamnesis_organ }}
                    </p>
                </div>
            </div>
            @endif

            {{-- Tombol Aksi --}}
            <div class="flex gap-4 justify-center">
                <a href="{{ route('laporan') }}"
                   class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-8 py-3 rounded-lg hover:from-gray-600 hover:to-gray-700 font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                    ← Kembali
                </a>

                <!-- <a href="{{ route('laporan_pdf', $laporan->id) }}"
                   class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                    ⬇️ Download PDF
                </a> -->
            </div>

        </div>

    </section>

</x-layout>
