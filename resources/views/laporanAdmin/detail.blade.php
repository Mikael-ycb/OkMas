<x-layout4>
    {{-- HEADER --}}
    <section class="px-20 pt-12 pb-4 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">Rekam Medis</h1>

        <p class="text-gray-600 mt-1 text-lg">
            {{ $pasien->nama }} — NIK: {{ $pasien->nik }}
        </p>

        <a href="{{ route('laporanAdmin.create', ['id_akun' => $pasien->id_akun]) }}"
           class="mt-4 inline-block bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-lg shadow-md">
            ➕ Tambah Rekam Medis Baru
        </a>
    </section>

    <div class="px-20 pb-16 bg-white">

        {{-- LIST REKAM MEDIS --}}
        @forelse ($laporan as $a)
            <div class="border rounded-xl p-6 shadow mb-6">
                <div class="flex justify-between">
                    <h2 class="text-xl font-bold text-blue-900">
                        {{ $a->jenis_pemeriksaan }}
                    </h2>

                    <span class="text-gray-500">
                        {{ \Carbon\Carbon::parse($a->tanggal)->format('d M Y') }}
                    </span>
                </div>

                <p class="mt-3">{{ $a->hasil_pemeriksaan ?? '-' }}</p>

                <div class="flex gap-4 mt-4">
                    <a href="{{ route('laporanAdmin.edit', $a->id) }}"
                       class="text-yellow-600 hover:text-yellow-800 text-lg">✏️ Edit</a>

                    <form action="{{ route('laporanAdmin.destroy', $a->id) }}" 
                          method="POST" onsubmit="return confirm('Hapus rekam medis ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 text-lg">🗑️ Hapus</button>
                    </form>
                </div>
            </div>

        @empty
            <p class="text-gray-500 mt-4">Belum ada rekam medis.</p>
        @endforelse

        {{-- PAGINATION --}}
        <div class="mt-6 flex justify-center">
            {{ $laporan->links() }}
        </div>
    </div>
</x-layout4>
