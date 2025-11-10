<x-layout4>
    {{-- Header --}}
    <section class="flex flex-col items-start justify-center px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Laporan</h2>
        <p class="text-gray-600 mt-1">{{ $nama_pasien }}</p>
    </section>

    <div class="px-20 pb-16 bg-white min-h-screen">
        {{-- Flash message --}}
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 border border-green-300 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah (prefill NIK & Nama via querystring) --}}
        <div class="flex justify-end mb-6">
            <a
                href="{{ route('laporanAdmin.create', ['nik' => request()->route('nik'), 'nama' => $nama_pasien]) }}"
                class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-lg font-medium shadow-md transition">
                ➕ Tambah Laporan
            </a>
        </div>

        <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="p-3 w-1/6">Tanggal</th>
                        <th class="p-3 w-1/4">Jenis Pemeriksaan</th>
                        <th class="p-3">Hasil</th>
                        <th class="p-3 text-center w-[140px]">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($pasien as $row)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-700">
                                {{-- aman klo tanggal string --}}
                                {{ $row->tanggal ? \Carbon\Carbon::parse($row->tanggal)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="p-4 text-gray-700">
                                {{ $row->jenis_pemeriksaan ?? '-' }}
                            </td>
                            <td class="p-4 text-gray-700">
                                {{ $row->hasil_pemeriksaan ?? '-' }}
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-4">
                                    {{-- Edit --}}
                                    <a href="{{ route('laporanAdmin.edit', $row->id) }}"
                                       class="text-yellow-500 hover:text-yellow-700 text-xl"
                                       title="Edit">
                                        ✏️
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('laporanAdmin.destroy', $row->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Hapus laporan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-500 hover:text-red-700 text-xl"
                                                title="Hapus">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-500">Belum ada laporan untuk pasien ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $pasien->links() }}
        </div>
    </div>
</x-layout4>
