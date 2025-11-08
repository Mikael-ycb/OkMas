<x-layout4>
    {{-- 🔹 Header judul di pojok kiri --}}
    <section class="flex flex-col items-start justify-center px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Laporan</h2>
    </section>

    <div class="px-20 pb-16 bg-white min-h-screen">
        {{-- 🔍 Pencarian & Tombol Tambah --}}
        <div class="flex justify-between items-center mb-6">
            <input
                type="text"
                placeholder="Cari Nama Pasien / ID"
                class="border border-gray-300 rounded px-4 py-2 w-[350px] focus:outline-none focus:ring-2 focus:ring-blue-500"
            />

        </div>

        {{-- 📋 Tabel Data --}}
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="p-3 text-left w-1/3">Nama Pasien</th>
                        <th class="p-3 text-left w-1/4">NIK</th>
                        <th class="p-3 text-left w-1/4">Terakhir Diedit</th>
                        <th class="p-3 text-center w-1/6">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($laporan as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-700">{{ $item->nama_pasien }}</td>
                            <td class="p-4 text-gray-700">{{ $item->nik }}</td>
                            <td class="p-4 text-gray-700">{{ $item->updated_at->format('d/m/Y') }}</td>
                            <td class="p-4 flex gap-4 justify-center">
                                <a href="{{ route('laporanAdmin.show', $item->nik) }}" class="text-blue-600 hover:text-blue-800 text-lg">👁️</a>
                                <a href="{{ route('laporanAdmin.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700 text-lg">✏️</a>
                                <a href="#" class="text-red-500 hover:text-red-700 text-lg">🗑️</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- 📑 Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $laporan->links() }}
        </div>
    </div>
</x-layout4>
