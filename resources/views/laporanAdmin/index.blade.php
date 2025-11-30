<x-layout4>
    {{-- HEADER --}}
    <section class="flex flex-col items-start justify-center px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Rekam Medis</h2>
    </section>

    <div class="px-20 pb-16 bg-white min-h-screen relative">

        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 border border-green-300 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search + Tambah --}}
        <div class="flex justify-between items-center mb-6">
            <input type="text" placeholder="Cari Nama Pasien / NIK"
                   class="border border-gray-300 rounded px-4 py-2 w-[350px] focus:ring-blue-500" />

            <a href="{{ route('laporanAdmin.create') }}"
               class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-lg shadow-md">
                ➕ Tambah Rekam Medis
            </a>
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="p-3 w-1/3">Nama Pasien</th>
                        <th class="p-3 w-1/4">NIK</th>
                        <th class="p-3 w-1/4">Terakhir Diedit</th>
                        <th class="p-3 text-center w-1/6">Tindakan</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($laporan as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4">{{ $item->akun->nama }}</td>
                            <td class="p-4">{{ $item->akun->nik }}</td>
                            <td class="p-4">
                                {{ optional($item->updated_at)->format('d/m/Y H:i') ?? '-' }}

                            </td>
                            <td class="p-4 flex justify-center gap-4">
                                <a href="{{ route('laporanAdmin.show', $item->id_akun) }}" 
                                   class="text-blue-600 hover:text-blue-800 text-xl">👁️</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-500">Belum ada rekam medis.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-6 flex justify-center">
            {{ $laporan->links() }}
        </div>
    </div>
</x-layout4>
