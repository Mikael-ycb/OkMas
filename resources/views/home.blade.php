<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- ======================= HERO SECTION ======================= --}}
    <section class="relative bg-cover bg-center bg-no-repeat min-h-[700px] w-full pb-24"
        style="background-image: url('{{ asset('img/hehe1.jpg') }}');">

        {{-- Overlay warna biru --}}
        <div class="absolute inset-0 bg-blue-900/70"></div>

        {{-- CONTAINER HERO --}}
        <div class="relative z-10 px-8 lg:px-24 pt-24">

            <div class="flex flex-col md:flex-row items-center justify-between">

                {{-- TEKS KIRI --}}
                <div class="max-w-xl text-white space-y-6"
                    style="animation: fadeInUp 1s ease forwards;">
                    <h5 class="uppercase tracking-widest font-semibold text-blue-200">Caring for Life</h5>

                    <h1 class="text-4xl sm:text-5xl font-bold leading-tight"
                        style="animation: fadeInUp 1s ease forwards 0.2s;">
                        Leading the Way in <br> Medical Excellence
                    </h1>

                    <p class="text-blue-100 text-lg"
                        style="animation: fadeInUp 1s ease forwards 0.4s;">
                        Kami berkomitmen memberikan pelayanan sunat dengan penuh kasih sayang terbaik
                        dengan tenaga cantik dan fasilitas modern.
                    </p>
                </div>

                {{-- GAMBAR KANAN --}}
                <div class="mt-10 md:mt-0 mb-24 flex justify-center md:justify-end"
                    style="animation: float 3s ease-in-out infinite;">
                    <img src="{{ asset('img/dokter.jpg') }}"
                        alt="Doctor"
                        class="w-[350px] md:w-[430px] rounded-xl shadow-xl object-cover transform transition-transform duration-500 hover:scale-105">
                </div>
            </div>

            {{-- TOMBOL 3 BUAH --}}
            <div class="mt-10 flex justify-center flex-wrap gap-12"
                style="animation: fadeInUp 1s ease forwards 0.6s;">
                {{-- Buat Janji --}}
                <a href="/janjiTemu"
                    class="flex flex-col items-center bg-white text-blue-900 px-8 py-6 rounded-xl shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl w-[190px]">
                    <div class="flex items-center justify-center w-14 h-14 rounded-full bg-blue-100 mb-2">
                        <span class="text-3xl">📅</span>
                    </div>
                    <span class="font-bold text-lg text-center">Buat Janji</span>
                </a>

                {{-- Klaster Dokter --}}
                <a href="/dokter"
                    class="flex flex-col items-center bg-white text-blue-900 px-8 py-6 rounded-xl shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl w-[190px]">
                    <div class="flex items-center justify-center w-14 h-14 rounded-full bg-blue-100 mb-2">
                        <span class="text-3xl">🩺</span>
                    </div>
                    <span class="font-bold text-lg text-center">Klaster Dokter</span>
                </a>

                {{-- Aduan Pelayanan --}}
                <a href="#aduan"
                    class="flex flex-col items-center bg-white text-blue-900 px-8 py-6 rounded-xl shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl w-[190px]">
                    <div class="flex items-center justify-center w-14 h-14 rounded-full bg-blue-100 mb-2">
                        <span class="text-3xl">💬</span>
                    </div>
                    <span class="font-bold text-lg text-center">Aduan Pelayanan</span>
                </a>
            </div>

        </div>
    </section>

    {{-- ======================= SECTION SELAMAT DATANG ======================= --}}
    <div class="relative z-10 flex flex-col items-center justify-center py-12 px-8 lg:px-20 text-center"
        style="animation: fadeInUp 1s ease forwards 0.8s;">
        <div class="max-w-3xl space-y-6">

            <h5 class="uppercase tracking-widest font-semibold text-blue-500">
                <b>Selamat Datang di Okemas</b>
            </h5>

            <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                Untuk Kesehatan Anda <br>
                Mengutamakan Pelayanan, Menjaga Kehidupan
            </h1>

            <p class="text-black text-lg leading-relaxed">
                Puskesmas kami berkomitmen memberikan layanan kesehatan yang ramah, cepat, dan terjangkau.
                Dengan tenaga medis profesional serta fasilitas yang memadai, kami siap melayani mulai dari
                pemeriksaan rutin, layanan gizi, imunisasi, hingga penanganan darurat.
                Tidak hanya mengobati, kami juga mendampingi masyarakat untuk hidup lebih sehat dan sejahtera.
            </p>

            <a href="#" class="text-blue-500 font-medium hover:underline">Pelajari Lebih Lanjut →</a>
        </div>
    </div>

    {{-- ======================= GAMBAR SECTION ======================= --}}
    <div class="mt-6 flex justify-center items-center w-full"
        style="animation: float 3s ease-in-out infinite;">
        <img src="{{ asset('img/oke.avif') }}"
            alt="Doctor"
            class="w-[400px] md:w-[800px] rounded-lg shadow-lg object-cover">
    </div>

    {{-- ======================= SECTION LAYANAN ======================= --}}
    <div class="relative z-10 flex flex-col items-center justify-center py-16 px-8 lg:px-20 text-center"
        style="animation: fadeInUp 1s ease forwards 1s;">

        <h5 class="uppercase tracking-widest font-semibold text-blue-500">
            <b>Pelayanan Kesehatan Terpercaya</b>
        </h5>

        <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-black mt-3">
            Layanan Kami
        </h1>

        <div class="mt-12 flex flex-col md:flex-row items-center justify-between h-full w-full">

            <div class="text-center md:text-left max-w-2xl text-black space-y-4"
                style="animation: fadeInUp 1s ease forwards 1.2s;">
                <h3 class="text-3xl sm:text-4xl font-bold leading-tight text-blue-900">
                    Kami Selalu Mengutamakan Pasien
                </h3>

                <ul class="text-lg space-y-2">
                    <li>• Dedikasi Untuk Penyembuhan</li>
                    <li>• Pelayanan Terbaik Kami</li>
                    <li>• Melayani Dengan Sepenuh Hati</li>
                    <li>• Pelayanan Berkualitas</li>
                    <li>• Percayakan Pada Kami</li>
                    <li>• Selalu Peduli</li>
                </ul>

                <p class="text-black text-lg leading-relaxed">
                    Puskesmas kami berkomitmen memberikan layanan kesehatan yang ramah, cepat,
                    dan terjangkau. Dengan tenaga medis profesional serta fasilitas yang memadai,
                    kami siap melayani mulai dari pemeriksaan rutin, layanan gizi, imunisasi,
                    hingga penanganan darurat.
                </p>
            </div>

            <div class="mt-10 md:mt-0 flex flex-col items-center md:items-end w-full md:w-1/2"
                style="animation: float 3s ease-in-out infinite;">
                <img src="{{ asset('img/dokter.jpg') }}"
                    class="w-[400px] md:w-[480px] rounded-lg shadow-lg object-cover transform transition-transform duration-500 hover:scale-105 mb-4">
                <img src="{{ asset('img/dokter.jpg') }}"
                    class="w-[400px] md:w-[480px] rounded-lg shadow-lg object-cover transform transition-transform duration-500 hover:scale-105">
            </div>

        </div>
    </div>

    {{-- ======================= Animations ======================= --}}
    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</x-layout>