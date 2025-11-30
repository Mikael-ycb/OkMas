<table class="w-full text-left">
    <thead class="bg-blue-900 text-white text-sm">
        <tr>
            <th class="px-6 py-3 font-semibold">No</th>
            <th class="px-6 py-3 font-semibold">Nama Pasien</th>
            <th class="px-6 py-3 font-semibold">Klaster</th>
            <th class="px-6 py-3 font-semibold">Tanggal Pemeriksaan</th>
            <th class="px-6 py-3 font-semibold text-center">Status</th>
            <th class="px-6 py-3 font-semibold text-center">Aksi</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-100">
        @foreach($data as $item)
        <tr class="hover:bg-gray-50 transition">

            <td class="px-6 py-3">{{ $loop->iteration }}</td>

            {{-- Ambil langsung dari tabel PERIKSA --}}
            <td>{{ $item->nama_pasien }}</td>

            <td>{{ $item->klaster }}</td>

            <td>{{ \Carbon\Carbon::parse($item->tanggal_periksa)->format('d/m/Y') }}</td>

            <td class="px-6 py-3 text-center">
                <button
                    data-id="{{ $item->id }}"
                    class="toggle-status px-4 py-1 rounded-full text-sm font-semibold 
                    {{ $item->status == 'Aktif' ? 'bg-blue-900 text-white' : 'bg-gray-400 text-white' }}">
                    {{ $item->status }}
                </button>
            </td>

            <td class="px-6 py-3 text-center">
                <a href="{{ route('periksa.edit', $item->id) }}"
                    class="text-yellow-500 hover:text-yellow-600">✏️</a>
            </td>
            

        </tr>
        @endforeach
    </tbody>

</table>

<div class="mt-6 flex justify-center">
    {{ $data->links() }}
</div>