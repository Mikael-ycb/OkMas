<x-layout>
    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-900">Beranda / Janji Temu</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    Janji Temu
                </h1>

            </div>
    </section>

    <section class="flex flex-col md:flex-row justify-center items-start gap-8 px-10 py-12 bg-gray-50">
        <div class="bg-white w-full md:w-1/2 space-y-4">
            <h2 class="text-2xl font-bold text-blue-900">Buat Janji Temu</h2>
            <p class="text-gray-700 text-sm">
                Kami hadir untuk memudahkan masyarakat dalam mengakses layanan kesehatan di Puskesmas tanpa perlu menunggu lama di lokasi.
                Melalui sistem ini, pasien dapat memilih jenis layanan, menentukan jadwal kunjungan, serta melakukan pendaftaran secara online.
            </p>

            <form action="{{ route('janjiTemu.store') }}" method="POST">
                @csrf
                <select name="tanggal_id" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-2">
                    <option selected disabled>Pilih Tanggal</option>
                    @foreach ($tanggals as $tgl)
                    <option value="{{ $tgl->id }}">
                        {{ \Carbon\Carbon::parse($tgl->tanggal)->format('d/m/Y') }}
                    </option>
                    @endforeach
                </select>

                <select name="klaster_id" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-2">
                    <option selected disabled>Klaster</option>
                    @foreach ($klasters as $klaster)
                    <option value="{{ $klaster->id }}">{{ $klaster->nama }}</option>
                    @endforeach
                </select>

                <select name="dokter_id" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-2">
                    <option selected disabled>Dokter</option>
                    @foreach ($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                    @endforeach
                </select>

                <textarea name="keluhan" class="w-full p-3 bg-blue-900 text-white focus:outline-none mb-3" placeholder="Keluhan"></textarea>

                <button class="w-full bg-blue-200 text-blue-900 font-semibold py-2 rounded-md hover:bg-blue-300">KIRIM</button>
            </form>


        </div>

        <div class="bg-blue-900 text-white rounded-md p-8 w-full md:w-1/2">
            <h2 class="text-2xl font-bold mb-4">Jadwalkan Jam</h2>
            <ul class="space-y-1 text-blue-100">
                <li class="flex justify-between"><span>Senin</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Selasa</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Rabu</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Kamis</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Jumat</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Sabtu</span><span>07:00 - 14:00</span></li>
                <li class="flex justify-between"><span>Minggu</span><span>UGD 24 Jam</span></li>
            </ul>
            <div class="border-t border-blue-200 my-6"></div>
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553 2.276A2 2 0 0121 14.118V19a2 2 0 01-2 2H5a2 2 0 01-2-2v-4.882a2 2 0 011.447-1.842L9 10m6 0V6a3 3 0 00-6 0v4m6 0H9" />
                </svg>
                <div>
                    <p class="font-semibold">Emergency</p>
                    <p>(0293)5921484</p>
                </div>
            </div>
        </div>
    </section>

    <section class="px-10 py-8 bg-gray-50">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Janji Temu</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($janjiTemus as $janji)
            <div class="bg-blue-200 p-6 rounded-md">
                <p class="font-semibold">{{ $janji->klaster->nama }}</p>
                <p class="text-lg font-bold">{{ $janji->dokter->nama }}</p>
                <p>{{ \Carbon\Carbon::parse($janji->tanggal->tanggal)->format('d/m/Y') }}</p>
                <p><em>Keluhan:</em> {{ $janji->keluhan }}</p>

                <div class="mt-3 flex gap-2">
                    <button class="bg-blue-900 text-white px-3 py-1 rounded-md hover:bg-blue-800">Edit Jadwal</button>
                    <button class="bg-blue-900 text-white px-3 py-1 rounded-md hover:bg-blue-800">Batal Periksa</button>
                </div>
            </div>
            @endforeach
        </div>
    </section>



</x-layout>