<x-layout>

    <section class="relative bg-cover bg-center h-[400px] w-full" style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col justify-center h-full max-w-7xl mx-auto px-6 lg:px-20 text-center md:text-left">
            <h5 class="uppercase tracking-widest font-semibold text-white mb-2" data-aos="fade-down" data-aos-delay="200">
                Beranda / Laporan
            </h5>
            <h1 class="text-4xl sm:text-5xl font-bold text-white leading-tight" data-aos="fade-up" data-aos-delay="400">
                Laporan
            </h1>
            <p class="text-white mt-4 max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                Temukan berbagai layanan kesehatan unggulan dari rumah sakit kami, didukung oleh tenaga medis profesional dan fasilitas modern.
            </p>
    </section>


    {{-- CONTENT --}}
    <section class="px-6 md:px-10 py-12 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-blue-900 mb-2">📋 Riwayat Pemeriksaan Anda</h2>
                <p class="text-gray-600">Lihat semua laporan pemeriksaan dan resep obat Anda</p>
            </div>

            {{-- Tidak ada riwayat --}}
            @if ($riwayat->isEmpty())
            <div class="bg-white p-12 rounded-2xl shadow-lg text-center border-2 border-dashed border-gray-300">
                <p class="text-2xl text-gray-400 mb-2">📭</p>
                <p class="text-lg text-gray-600 font-medium">Anda belum memiliki riwayat pemeriksaan</p>
                <p class="text-gray-500 mt-2">Silakan membuat janji temu dengan dokter kami</p>
            </div>

            @else

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($riwayat as $item)

                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border-l-4 border-blue-900 relative group">
                    
                    {{-- Header dengan Nomor Antrian --}}
                    <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4 text-white">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-white">📅 Tanggal Periksa</p>
                                <p class="text-2xl font-bold text-white">
                                    {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                                </p>
                            </div>
                            @if ($item->janjiTemu && $item->janjiTemu->nomor_antrian)
                            <div class="bg-white/20 px-4 py-2 rounded-lg">
                                <p class="text-xs opacity-90">Antrian</p>
                                <p class="text-2xl font-bold">{{ $item->janjiTemu->nomor_antrian }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Main Content --}}
                    <div class="p-6">
                        
                        {{-- Jenis Pemeriksaan (Besar) --}}
                        <div class="mb-5 pb-5 border-b-2 border-gray-100">
                            <p class="text-xs uppercase tracking-wider font-semibold text-gray-500 mb-1">Jenis Pemeriksaan</p>
                            <p class="text-xl font-bold text-blue-900">
                                🏥 {{ $item->jenis_pemeriksaan ?? '-' }}
                            </p>
                        </div>

                        {{-- Dokter --}}
                        <div class="mb-4 pb-4 border-b border-gray-100">
                            <p class="text-xs uppercase tracking-wider font-semibold text-gray-500 mb-1">Dokter Pemeriksa</p>
                            <p class="text-lg font-bold text-gray-800">
                                👨‍⚕️ {{ $item->janjiTemu?->dokter?->nama_dokter ?? '-' }}
                            </p>
                        </div>

                        {{-- Keluhan --}}
                        <div class="mb-4 pb-4 border-b border-gray-100">
                            <p class="text-xs uppercase tracking-wider font-semibold text-gray-500 mb-1">Keluhan Utama</p>
                            <p class="text-sm text-gray-700 italic">
                                "{{ $item->janjiTemu?->keluhan ?? '-' }}"
                            </p>
                        </div>

                        {{-- Diagnosa --}}
                        <div class="mb-4 pb-4 border-b border-gray-100 bg-red-50 p-3 rounded-lg">
                            <p class="text-xs uppercase tracking-wider font-semibold text-red-700 mb-1">Diagnosa</p>
                            <p class="text-sm font-medium text-red-900">
                                🔍 {{ $item->diagnosa ?? '-' }}
                            </p>
                        </div>

                        {{-- Hasil Pemeriksaan --}}
                        <div class="mb-4 pb-4 border-b border-gray-100 bg-green-50 p-3 rounded-lg">
                            <p class="text-xs uppercase tracking-wider font-semibold text-green-700 mb-1">Hasil Pemeriksaan</p>
                            <p class="text-sm font-medium text-green-900">
                                ✓ {{ $item->hasil_pemeriksaan ?? '-' }}
                            </p>
                        </div>

                        {{-- Anamnesis --}}
                        @if ($item->anamnesis)
                        <div class="mb-4 pb-4 border-b border-gray-100">
                            <p class="text-xs uppercase tracking-wider font-semibold text-gray-500 mb-1">Anamnesis</p>
                            <p class="text-sm text-gray-700">{{ substr($item->anamnesis, 0, 80) }}{{ strlen($item->anamnesis) > 80 ? '...' : '' }}</p>
                        </div>
                        @endif

                        {{-- Tekanan Darah --}}
                        @if ($item->tekanan_darah)
                        <div class="mb-4 pb-4 border-b border-gray-100 bg-blue-50 p-3 rounded-lg">
                            <p class="text-xs uppercase tracking-wider font-semibold text-blue-700 mb-1">Tekanan Darah</p>
                            <p class="text-lg font-bold text-blue-900">
                                ❤️ {{ $item->tekanan_darah }}
                            </p>
                        </div>
                        @endif

                        {{-- Riwayat Penyakit Sekarang --}}
                        @if ($item->riwayat_penyakit_sekarang)
                        <div class="mb-4 pb-4 border-b border-gray-100 bg-yellow-50 p-3 rounded-lg">
                            <p class="text-xs uppercase tracking-wider font-semibold text-yellow-700 mb-1">Riwayat Penyakit Sekarang</p>
                            <p class="text-sm text-yellow-900">{{ substr($item->riwayat_penyakit_sekarang, 0, 60) }}{{ strlen($item->riwayat_penyakit_sekarang) > 60 ? '...' : '' }}</p>
                        </div>
                        @endif

                        {{-- Resep Obat --}}
                        @if ($item->resepObat && $item->resepObat->isNotEmpty())
                        <div class="mb-4">
                            @foreach ($item->resepObat as $resep)
                                @if ($resep->detail && $resep->detail->isNotEmpty())
                                    <a href="{{ route('laporan_detail', $item->id) }}" class="block">
                                        <div class="bg-gradient-to-r from-orange-50 to-red-50 p-4 rounded-xl border-2 border-orange-200 hover:shadow-lg hover:border-orange-300 transition-all duration-300 cursor-pointer">
                                            <p class="text-sm font-bold text-orange-900 mb-3 flex items-center">
                                                <span class="text-2xl mr-2">💊</span> RESEP OBAT DIBERIKAN
                                            </p>
                                            <p class="text-xs text-orange-700 font-semibold mb-3">Dokter: {{ $resep->dokter }}</p>
                                            
                                            <div class="space-y-2">
                                                @foreach ($resep->detail as $detail)
                                                    <div class="bg-white p-3 rounded border-l-4 border-orange-500 shadow-sm hover:shadow-md transition-all">
                                                        <p class="font-semibold text-gray-800 text-sm">
                                                            💊 {{ $detail->obat->nama_obat ?? '-' }}
                                                        </p>
                                                        <div class="text-xs text-gray-600 mt-2 space-y-1">
                                                            <p><span class="font-semibold text-gray-700">Dosis:</span> {{ $detail->obat->dosis ?? '-' }}</p>
                                                            <p><span class="font-semibold text-gray-700">Jumlah:</span> {{ $detail->jumlah }} • <span class="font-semibold text-gray-700">Aturan Pakai:</span> {{ $detail->aturan_pakai ?? '-' }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            
                                            <div class="mt-3 text-center text-orange-700 font-semibold text-sm">
                                                👁️ Klik untuk lihat detail lengkap
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        @else
                            <div class="mb-4 bg-yellow-50 p-4 rounded-xl border-2 border-dashed border-yellow-300">
                                <p class="text-sm font-semibold text-yellow-800 text-center">
                                    ⏳ Belum ada resep obat untuk pemeriksaan ini
                                </p>
                            </div>
                        @endif

                        {{-- Saran dari Dokter --}}
                        @if ($item->saran)
                        <div class="mb-4 bg-purple-50 p-4 rounded-lg border-l-4 border-purple-500">
                            <p class="text-xs uppercase tracking-wider font-semibold text-purple-700 mb-2">💡 Saran dari Dokter</p>
                            <p class="text-sm text-purple-900 italic">{{ $item->saran }}</p>
                        </div>
                        @endif

                    </div>

                    <!-- {{-- Tombol Aksi --}}
                    <div class="px-6 pb-6 space-y-3 border-t pt-4">
                        <a href="{{ route('laporan_detail', $item->id) }}"
                            class="block text-center bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                            👁️ LIHAT DETAIL LENGKAP
                        </a>
                    </div> -->

                </div>

            @endforeach

        </div>

        @endif

    </section>

</x-layout>