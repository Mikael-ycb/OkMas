<x-layout>
    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-200">Beranda / Laporan</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-white">
                    Laporan Pemeriksaan
                </h1>
            </div>
        </div>
    </section>

    <section class="px-10 py-12 bg-gray-50">
        <h1 class="text-4xl font-bold text-blue-900 mb-6">Laporan Pemeriksaan</h1>

        @if ($riwayat->isEmpty())
        <div class="bg-white p-6 rounded shadow text-center text-gray-600">
            Anda belum memiliki riwayat pemeriksaan.
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($riwayat as $item)
            <div class="bg-white shadow-md p-5 rounded-lg border border-blue-200 relative">

                {{-- Nomor Antrian --}}
                <span class="absolute top-3 right-3 bg-blue-900 text-white px-3 py-1 rounded text-sm">
                    No: {{ $item->nomor_antrian ?? '-' }}
                </span>

                {{-- Tanggal --}}
                <p class="text-sm text-gray-600">Tanggal</p>
                <p class="font-semibold text-blue-900">
                    {{ $item->janjiTemu && $item->janjiTemu->tanggal 
                                ? \Carbon\Carbon::parse($item->janjiTemu->tanggal->tanggal)->format('d M Y') 
                                : '-' }}
                </p>

                {{-- Klaster --}}
                <div class="mt-3">
                    <p class="text-sm text-gray-600">Klaster</p>
                    <p class="font-semibold">
                        {{ $item->janjiTemu && $item->janjiTemu->klaster 
                                    ? $item->janjiTemu->klaster->nama 
                                    : $item->klaster ?? '-' }}
                    </p>
                </div>

                {{-- Dokter --}}
                <div class="mt-3">
                    <p class="text-sm text-gray-600">Dokter Pemeriksa</p>
                    <p class="font-bold text-blue-800">
                        {{ $item->janjiTemu && $item->janjiTemu->dokter 
                                    ? $item->janjiTemu->dokter->nama_dokter 
                                    : '-' }}
                    </p>
                </div>

                {{-- Keluhan --}}
                <div class="mt-3">
                    <p class="text-sm text-gray-600">Keluhan Pasien</p>
                    <p class="italic">
                        {{ $item->janjiTemu ? $item->janjiTemu->keluhan : '-' }}
                    </p>
                </div>

                {{-- Status --}}
                <div class="mt-3 border-t pt-3">
                    <p class="text-sm text-gray-600">Status Pemeriksaan</p>
                    <p class="font-semibold text-green-700">Selesai</p>
                </div>

            </div>
            @endforeach
        </div>
        @endif
    </section>
</x-layout>