<div class="overflow-x-auto rounded-2xl shadow-lg border border-gray-200">
    <table class="w-full text-left">
        <thead class="bg-gradient-to-r from-slate-800 to-slate-900 text-white text-sm font-bold">
            <tr>
                <th class="px-6 py-4 text-center">No</th>
                <th class="px-6 py-4">👤 Nama Pasien</th>
                <th class="px-6 py-4">🏥 Klaster</th>
                <th class="px-6 py-4">📅 Tanggal</th>
                <th class="px-6 py-4 text-center">⏱️ Antrian</th>
                <th class="px-6 py-4 text-center">Status</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse($data as $item)
            <tr class="hover:bg-indigo-50 transition-all duration-200 border-b">

                <td class="px-6 py-4 text-center font-bold text-indigo-600">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>

                <td class="px-6 py-4">
                    <div class="font-semibold text-gray-800">{{ $item->nama_pasien }}</div>
                </td>

                <td class="px-6 py-4">
                    @if($item->klaster == 'Umum')
                        <span class="inline-flex items-center bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-xs font-bold">🩺 Umum</span>
                    @elseif($item->klaster == 'Gigi dan Mulut')
                        <span class="inline-flex items-center bg-pink-100 text-pink-700 px-4 py-2 rounded-full text-xs font-bold">🦷 Gigi</span>
                    @elseif($item->klaster == 'Bidan')
                        <span class="inline-flex items-center bg-rose-100 text-rose-700 px-4 py-2 rounded-full text-xs font-bold">👶 Bidan</span>
                    @else
                        <span class="inline-flex items-center bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-xs font-bold">{{ $item->klaster }}</span>
                    @endif
                </td>

                <td class="px-6 py-4 font-semibold text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_periksa)->format('d M Y') }}</td>

                <td class="px-6 py-4 text-center">
                    <span class="inline-block bg-indigo-100 text-indigo-700 px-4 py-2 rounded-lg font-bold text-sm">
                        #{{ $item->nomor_antrian ?? '-' }}
                    </span>
                </td>

                <td class="px-6 py-4 text-center">
                    @if($item->status === 'Aktif')
                        <span class="inline-block bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 px-4 py-2 rounded-full text-xs font-bold border-2 border-green-300">
                            ✅ Aktif
                        </span>
                    @else
                        <span class="inline-block bg-gradient-to-r from-gray-100 to-gray-200 text-gray-600 px-4 py-2 rounded-full text-xs font-bold border-2 border-gray-300">
                            ✓ Selesai
                        </span>
                    @endif
                </td>

                <td class="px-6 py-4 text-center">
                    <div class="flex gap-2 justify-center">
                        @if($item->status === 'Aktif')
                            <a href="{{ route('periksa.formLaporan', $item->id) }}"
                               class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition-all duration-200 shadow-lg hover:shadow-xl">
                                ✅ Selesaikan
                            </a>
                        @else
                            <span class="inline-flex items-center bg-gray-300 text-gray-600 px-4 py-2 rounded-lg text-sm font-bold opacity-50 cursor-not-allowed">
                                ✓ Selesai
                            </span>
                        @endif
                        
                        <a href="{{ route('periksa.edit', $item->id) }}"
                           class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition-all duration-200 shadow-lg hover:shadow-xl">
                            ✏️ Edit
                        </a>
                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-12 text-center">
                    <div class="text-gray-400 text-lg">
                        <p class="text-4xl mb-2">📭</p>
                        <p class="font-semibold">Tidak ada data pemeriksaan</p>
                        <p class="text-sm text-gray-500">Silakan ubah filter tanggal atau klaster</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>
</div>

<div class="mt-8 flex justify-center">
    {{ $data->links('pagination::tailwind') }}
</div>