<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Laporan</h2>
        <p class="text-gray-600 font-medium mt-1">{{ $nama_pasien }}</p>
    </section>

    <div class="px-20 pb-20 bg-white min-h-screen">
        <div class="flex justify-end mb-6">
        </div>

        <div class="overflow-hidden bg-white shadow-md rounded-xl border border-gray-200">
            <table class="w-full text-left">
                <thead class="bg-blue-900 text-white text-sm">
                    <tr>
                        <th class="px-6 py-3 font-semibold w-[15%] text-center">Tindakan</th>
                        <th class="px-6 py-3 font-semibold w-[20%]">Tanggal</th>
                        <th class="px-6 py-3 font-semibold w-[25%]">Jenis Pemeriksaan</th>
                        <th class="px-6 py-3 font-semibold">Laporan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($pasien as $data)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 flex justify-center gap-4 text-lg">
                                <a href="{{ route('laporanAdmin.edit', $data->id) }}" class="text-yellow-500 hover:text-yellow-600">✏️</a>
                                <a href="#" class="text-red-500 hover:text-red-700">🗑️</a>
                            </td>
                            <td class="px-6 py-3 text-gray-700">{{ $data->tanggal }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $data->jenis_pemeriksaan }}</td>
                            <td class="px-6 py-3 text-gray-700">Laporan</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $pasien->links() }}
        </div>
    </div>
</x-layout4>
