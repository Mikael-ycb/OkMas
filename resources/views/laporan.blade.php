<x-layout>

    {{-- HEADER IMAGE --}}
    <section class="relative h-64 bg-cover bg-center"
        style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 h-full flex items-center px-10">
            <div class="text-white">
                <h5 class="uppercase tracking-wide text-blue-200">Beranda / Laporan</h5>
                <h1 class="text-4xl font-bold">Laporan Pemeriksaan</h1>
            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="px-10 py-12">

        <h2 class="text-3xl font-bold text-blue-900 mb-6">Riwayat Pemeriksaan Anda</h2>

        {{-- Tidak ada riwayat --}}
        @if ($riwayat->isEmpty())
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <p class="text-gray-600">Anda belum memiliki riwayat pemeriksaan.</p>
            </div>

        @else

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($riwayat as $item)

                    <div class="bg-white rounded-xl shadow p-5 border border-gray-200 relative">

                        {{-- Nomor antrian --}}
                        <span class="absolute top-3 right-3 bg-blue-900 text-white px-3 py-1 rounded text-xs">
                            No. {{ $item->periksa->janjiTemu->nomor_antrian ?? '-' }}
                        </span>

                        {{-- Tanggal --}}
                        <p class="text-xs text-gray-500">Tanggal Periksa</p>
                        <p class="text-lg font-semibold text-blue-900">
                            {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                        </p>

                        {{-- Klaster --}}
                        <div class="mt-3">
                            <p class="text-xs text-gray-500">Klaster Pemeriksaan</p>
                            <p class="font-medium">
                                {{ $item->jenis_pemeriksaan ?? '-' }}
                            </p>
                        </div>

                        {{-- Dokter --}}
                        <div class="mt-3">
                            <p class="text-xs text-gray-500">Dokter</p>
                            <p class="font-semibold text-blue-800">
                            {{ $item->periksa->janjiTemu->dokter->nama_dokter ?? '-' }}
                            </p>
                        </div>

                        {{-- Keluhan --}}
                        <div class="mt-3">
                            <p class="text-xs text-gray-500">Keluhan</p>
                            <p class="italic text-gray-700">
                                {{ $item->periksa->janjiTemu->keluhan ?? '-' }}
                            </p>
                        </div>

                        {{-- Status --}}
                        <div class="mt-4 border-t pt-3">
                            <p class="text-xs text-gray-500">Status Pemeriksaan</p>
                            <p class="text-green-700 font-semibold">Selesai</p>
                        </div>

                        {{-- Tombol laporan --}}
                        <div class="mt-5 space-y-2">
                            <a href="{{ route('laporan_detail', $item->id) }}"
                                class="block text-center bg-green-600 text-white py-2 rounded-md hover:bg-green-700">
                                📄 Lihat Laporan
                            </a>

                            <!-- <a href="{{ route('laporan_pdf', $item->id) }}"
                                class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                                ⬇️ Download PDF
                            </a> -->
                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </section>

</x-layout>
