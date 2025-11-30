<x-layout4>
<div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-blue-900">Daftar Resep Obat</h2>
        <a href="{{ route('resep.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Tambah Resep
        </a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-blue-100 text-left">
                <th class="p-3">Pasien</th>
                <th class="p-3">Obat</th>
                <th class="p-3">Jumlah</th>
                <th class="p-3">Aturan Pakai</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resep as $r)
                <tr class="border-b">
                    <td class="p-3">{{ $r->pasien->nama }}</td>
                    <td class="p-3">{{ $r->obat->nama_obat }}</td>
                    <td class="p-3">{{ $r->jumlah }}</td>
                    <td class="p-3">{{ $r->aturan_pakai }}</td>
                    <td class="p-3">{{ $r->tanggal_resep }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('resep.edit', $r->id) }}"
                           class="text-yellow-500 hover:text-yellow-600">✏️</a>

                        <form action="{{ route('resep.destroy', $r->id) }}" method="POST" 
                              onsubmit="return confirm('Hapus resep ini?')">
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
</x-layout4>
