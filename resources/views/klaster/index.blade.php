<x-layout4>
    <div class="mb-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="text-4xl font-bold text-blue-900 mb-2">🏥 Manajemen Klaster</h2>
                <p class="text-gray-600">Kelola unit layanan kesehatan dan dokter yang tersedia</p>
            </div>
            <a href="{{ route('klaster.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition">
                ➕ Tambah Klaster Baru
            </a>
        </div>
    </div>

    {{-- STATS CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border-l-4 border-blue-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600 font-semibold">Total Klaster</p>
                    <p class="text-4xl font-bold text-blue-900 mt-2">{{ $klasters->count() }}</p>
                </div>
                <span class="text-4xl">🏥</span>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 border-l-4 border-purple-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600 font-semibold">Total Dokter</p>
                    <p class="text-4xl font-bold text-purple-900 mt-2">{{ \App\Models\Dokter::count() }}</p>
                </div>
                <span class="text-4xl">👨‍⚕️</span>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-600 font-semibold">Rata-rata Dokter/Klaster</p>
                    <p class="text-4xl font-bold text-green-900 mt-2">
                        {{ $klasters->count() > 0 ? round(\App\Models\Dokter::count() / $klasters->count(), 1) : 0 }}
                    </p>
                </div>
                <span class="text-4xl">📊</span>
            </div>
        </div>
    </div>

    @if ($klasters->isEmpty())
        <div class="bg-yellow-50 border-2 border-yellow-300 rounded-xl p-12 text-center">
            <p class="text-3xl mb-4">📭</p>
            <p class="text-xl text-yellow-800 font-semibold mb-2">Belum ada data klaster</p>
            <p class="text-yellow-700 mb-6">Mulai dengan menambahkan klaster kesehatan baru</p>
            <a href="{{ route('klaster.create') }}" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                ➕ Buat Klaster Pertama
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 gap-6">
            @foreach ($klasters as $klaster)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition border-t-4 border-blue-500 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="text-3xl">🏥</span>
                                    <div>
                                        <p class="text-sm text-gray-500">ID #{{ $klaster->id }}</p>
                                        <h3 class="text-2xl font-bold text-blue-900">{{ $klaster->nama }}</h3>
                                    </div>
                                </div>
                                
                                @if($klaster->jenis)
                                <p class="text-sm text-gray-600 mb-2">
                                    <span class="font-semibold">Jenis:</span> {{ $klaster->jenis }}
                                </p>
                                @endif

                                @if($klaster->deskripsi)
                                <div class="bg-gray-50 p-4 rounded-lg mt-3 mb-3">
                                    <p class="text-sm text-gray-700 leading-relaxed">
                                        {{ Str::limit($klaster->deskripsi, 200) }}
                                    </p>
                                </div>
                                @endif
                            </div>

                            {{-- Stats Dokter --}}
                            <div class="text-right ml-6">
                                <div class="bg-purple-50 rounded-lg p-4">
                                    <p class="text-sm text-gray-600 font-semibold mb-1">Dokter</p>
                                    <p class="text-3xl font-bold text-purple-600">{{ $klaster->dokters->count() }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Daftar Dokter --}}
                        @if($klaster->dokters->isNotEmpty())
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm font-semibold text-gray-600 mb-3">👨‍⚕️ Dokter di Klaster ini:</p>
                            <div class="space-y-2">
                                @foreach($klaster->dokters as $dokter)
                                <div class="bg-blue-50 p-3 rounded-lg flex justify-between items-center">
                                    <span class="font-medium text-gray-800">{{ $dokter->nama_dokter }}</span>
                                    <span class="text-xs bg-blue-200 text-blue-800 px-3 py-1 rounded-full">{{ $dokter->spesialisasi ?? 'Umum' }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-yellow-700 bg-yellow-50 p-3 rounded-lg">⚠️ Belum ada dokter yang ditetapkan ke klaster ini</p>
                        </div>
                        @endif
                    </div>

                    {{-- Action Buttons --}}
                    <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end border-t border-gray-200">
                        <a href="{{ route('klaster.edit', $klaster->id) }}" 
                           class="flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-semibold transition">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('klaster.destroy', $klaster->id) }}" method="POST" style="display: inline;"
                              onsubmit="return confirm('Yakin ingin menghapus klaster ini? (' + {{ $klaster->dokters->count() }} + ' dokter akan terpengaruh)');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold transition">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout4>

