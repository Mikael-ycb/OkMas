<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Obat</h2>
    </section>

    <div class="px-20 pb-20 bg-white min-h-screen">
        <div class="flex justify-end mb-6">
            <a href="{{ route('obatAdmin.create') }}" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                + Tambah
            </a>
        </div>

        <div class="overflow-hidden bg-white shadow-md rounded-xl border border-gray-200">
            <table class="w-full text-left">
                <thead class="bg-blue-900 text-white text-sm">
                    <tr>
                        <th class="px-6 py-3">Nama Obat</th>
                        <th class="px-6 py-3">Dosis</th>
                        <th class="px-6 py-3">Penyakit</th>
                        <th class="px-6 py-3">EXP</th>
                        <th class="px-6 py-3">Stok</th>
                        <th class="px-6 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($obat as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3">{{ $item->nama_obat }}</td>
                            <td class="px-6 py-3">{{ $item->dosis }}</td>
                            <td class="px-6 py-3">{{ $item->penyakit }}</td>
                            <td class="px-6 py-3">{{ $item->exp }}</td>
                            <td class="px-6 py-3">{{ $item->stok }}</td>
                            <td class="px-6 py-3 text-center flex justify-center gap-3">
                                <a href="{{ route('obatAdmin.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-600">✏️</a>
                                <form action="{{ route('obatAdmin.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus obat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $obat->links() }}
        </div>
    </div>
</x-layout4>
