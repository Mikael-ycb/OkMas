<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Akun Pasien</h2>
    </section>

    <div class="px-20 pb-20 bg-white min-h-screen">
        {{-- Tombol Tambah --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('akunPasienAdmin.create') }}" 
               class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                + Tambah Akun
            </a>
        </div>

        {{-- Tabel Daftar Akun --}}
        <div class="overflow-hidden bg-white shadow-md rounded-xl border border-gray-200">
            <table class="w-full text-left">
                <thead class="bg-blue-900 text-white text-sm">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Nama</th>
                        <th class="px-6 py-3 font-semibold">NIK</th>
                        <th class="px-6 py-3 font-semibold">Username</th>
                        <th class="px-6 py-3 font-semibold">No. Telepon</th>
                        <th class="px-6 py-3 font-semibold">Role</th>
                        <th class="px-6 py-3 font-semibold text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($akun as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 text-gray-700">{{ $item->nama }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $item->nik }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $item->username }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $item->no_telepon ?? '-' }}</td>
                            <td class="px-6 py-3 text-gray-700 capitalize">{{ $item->role }}</td>
                            <td class="px-6 py-3 flex justify-center gap-4 text-lg">
                                <a href="{{ route('akunPasienAdmin.edit', $item->id_akun) }}" class="text-yellow-500 hover:text-yellow-600">✏️</a>
                                <form action="{{ route('akunPasienAdmin.destroy', $item->id_akun) }}" method="POST" onsubmit="return confirm('Yakin hapus akun ini?')">
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

        {{-- Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $akun->links() }}
        </div>
    </div>
</x-layout4>
