<x-layout>
    <section class="px-10 py-8 bg-gray-50">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Edit Janji Temu</h2>

        <form action="{{ route('janjiTemu.update', $janji->id) }}" method="POST" class="space-y-4 w-full md:w-1/2">
            @csrf
            @method('PUT')

            <select name="tanggal_id" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-2">
                @foreach ($tanggals as $tgl)
                <option value="{{ $tgl->id }}" {{ $janji->tanggal_id == $tgl->id ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::parse($tgl->tanggal)->format('d/m/Y') }}
                </option>
                @endforeach
            </select>

            <select name="klaster_id" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-2">
                @foreach ($klasters as $klaster)
                <option value="{{ $klaster->id }}" {{ $janji->klaster_id == $klaster->id ? 'selected' : '' }}>
                    {{ $klaster->nama }}
                </option>
                @endforeach
            </select>

            <select name="dokter_id" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-2">
                @foreach ($dokters as $dokter)
                <option value="{{ $dokter->id }}" {{ $janji->dokter_id == $dokter->id ? 'selected' : '' }}>
                    {{ $dokter->nama }}
                </option>
                @endforeach
            </select>

            <textarea name="keluhan" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-3">{{ $janji->keluhan }}</textarea>

            <button class="w-full bg-blue-200 text-blue-900 font-semibold py-2 rounded-md hover:bg-blue-300">
                SIMPAN PERUBAHAN
            </button>
        </form>
    </section>
</x-layout>