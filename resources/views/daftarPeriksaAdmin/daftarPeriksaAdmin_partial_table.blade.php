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

            <td class="px-6 py-3 text-center" style="color: black;">

    @if($item->status === 'Aktif')
        <a href="{{ route('periksa.formLaporan', $item->id) }}"
           class="inline-block bg-green-600 text-white px-5 py-2 rounded-full text-sm font-semibold 
                  shadow-md border border-green-800 relative z-50 hover:bg-green-700 transition">
            Selesaikan
        </a>
    @else
        <span class="inline-block bg-gray-400 text-white px-5 py-2 rounded-full text-sm font-semibold 
                     shadow-md border border-gray-600">
            Selesai
        </span>
    @endif

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