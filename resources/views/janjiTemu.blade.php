<x-layout>

    {{-- HEADER --}}
    <section class="relative bg-cover bg-center h-[350px]"
        style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 flex items-center h-full px-10 text-white">
            <div>
                <h5 class="uppercase tracking-wider text-blue-200">Beranda / Janji Temu</h5>
                <h1 class="text-4xl font-bold text-blue-100">Janji Temu</h1>
            </div>
        </div>
    </section>

    {{-- FORM BUAT JANJI --}}
    <section class="flex flex-col md:flex-row gap-10 px-10 py-12 bg-gray-50">

        {{-- Form --}}
        <div class="bg-white w-full md:w-1/2 p-6 rounded shadow">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Buat Janji Temu</h2>

            <form action="{{ route('janjiTemu.store') }}" method="POST">
                @csrf

                <select name="tanggal_id" class="w-full p-3 bg-blue-900 text-white mb-3">
                    <option selected disabled>Pilih Tanggal</option>
                    @foreach ($tanggals as $tgl)
                        <option value="{{ $tgl->id }}">
                            {{ \Carbon\Carbon::parse($tgl->tanggal)->format('d/m/Y') }}
                        </option>
                    @endforeach
                </select>

                <select name="klaster_id" class="w-full p-3 bg-blue-900 text-white mb-3" id="klasterSelect">
                    <option selected disabled>Pilih Klaster</option>
                    @foreach ($klasters as $klaster)
                        <option value="{{ $klaster->id }}">{{ $klaster->nama }}</option>
                    @endforeach
                </select>

                <select name="dokter_id" id="dokterSelect" class="w-full p-3 bg-blue-900 text-white mb-3">
                    <option selected disabled>Pilih Dokter</option>
                </select>

                <textarea name="keluhan" class="w-full p-3 bg-blue-900 text-white mb-3"
                    placeholder="Keluhan"></textarea>

                <button class="w-full bg-blue-200 text-blue-900 font-semibold py-2 rounded">
                    KIRIM
                </button>
            </form>
        </div>


        {{-- Jadwal --}}
        <div class="bg-blue-900 text-white rounded p-8 w-full md:w-1/2">
            <h2 class="text-2xl font-bold mb-4">Jadwal Pelayanan</h2>
            <ul class="space-y-1 text-blue-100">
                <li class="flex justify-between"><span>Senin</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Selasa</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Rabu</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Kamis</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Jumat</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Sabtu</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Minggu</span><span>UGD 24 Jam</span></li>
            </ul>
        </div>

    </section>

    {{-- DATA JANJI TEMU --}}
    <section class="px-10 py-8 bg-gray-50">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Janji Temu Anda</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($janjiTemus as $janji)
                {{-- ❗ TAMPILKAN HANYA PERIKSA YANG MASIH AKTIF --}}
                @if ($janji->periksa && $janji->periksa->status == 'Aktif')

                <div class="bg-blue-200 p-6 rounded relative">

                    <p class="font-semibold">{{ $janji->klaster->nama }}</p>
                    <p class="text-lg font-bold">{{ $janji->dokter->nama_dokter }}</p>
                    <p>{{ \Carbon\Carbon::parse($janji->tanggal->tanggal)->format('d/m/Y') }}</p>
                    <p><em>Keluhan:</em> {{ $janji->keluhan }}</p>

                    <span class="absolute top-2 right-3 bg-blue-900 text-white px-3 py-1 rounded text-sm">
                        No. {{ $janji->nomor_antrian }}
                    </span>

                    <div class="mt-4 flex gap-3">
                        <a href="{{ route('janjiTemu.edit', $janji->id) }}"
                            class="bg-blue-900 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form action="{{ route('janjiTemu.destroy', $janji->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin membatalkan?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded">
                                Batal
                            </button>
                        </form>
                    </div>
                </div>

                @endif
            @endforeach

        </div>
    </section>


    {{-- SCRIPT LOAD DOKTER --}}
    <script>
        document.getElementById('klasterSelect').addEventListener('change', function() {
            let id = this.value;

            let dokterSelect = document.getElementById('dokterSelect');
            dokterSelect.innerHTML = '<option selected disabled>Memuat...</option>';

            fetch(`/get-dokter-by-klaster/${id}`)
                .then(res => res.json())
                .then(data => {
                    dokterSelect.innerHTML = '<option selected disabled>Pilih Dokter</option>';
                    data.forEach(d => {
                        dokterSelect.innerHTML += `<option value="${d.id}">${d.nama_dokter}</option>`;
                    });
                });
        });
    </script>

</x-layout>
