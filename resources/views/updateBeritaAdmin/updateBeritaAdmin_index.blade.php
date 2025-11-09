<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Update Berita</h2>
    </section>

    <div class="px-20 pb-20 bg-white min-h-screen">
        <div class="flex justify-end mb-6">
            <a href="{{ route('berita.create') }}" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800 transition">Tambah</a>
        </div>

        <div class="overflow-hidden bg-white shadow-md rounded-xl border border-gray-200">
            <table class="w-full text-left">
                <thead class="bg-blue-900 text-white text-sm">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Judul Berita</th>
                        <th class="px-6 py-3 font-semibold">Program</th>
                        <th class="px-6 py-3 font-semibold">Tanggal</th>
                        <th class="px-6 py-3 font-semibold text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($berita as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3">{{ $item->judul }}</td>
                            <td class="px-6 py-3">{{ $item->program ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $item->tanggal ? $item->tanggal->format('d/m/Y') : '-' }}</td>
                            <td class="px-6 py-3 flex justify-center gap-4 text-lg">
                                <a href="{{ route('berita.show', $item->id) }}" class="text-blue-600 hover:text-blue-800">👁️</a>
                                <a href="{{ route('berita.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-600">✏️</a>
                                <form action="{{ route('berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $berita->links() }}
        </div>
    </div>
</x-layout4>
