<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- ======================= HERO SECTION ======================= --}}
    <section class="relative min-h-[750px] w-full flex items-center bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/hehe1.jpg') }}');">

        {{-- Overlay + Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/80 to-blue-800/70 backdrop-blur-sm"></div>

        {{-- CONTENT --}}
        <div class="relative z-10 w-full px-8 lg:px-24 flex flex-col md:flex-row items-center justify-between">

            {{-- Text --}}
            <div class="max-w-xl text-white space-y-6 animate-fade-up">
                <h5 class="uppercase tracking-wider font-semibold text-blue-200">Caring for Life</h5>

                <h1 class="text-5xl md:text-6xl font-bold leading-tight drop-shadow-md">
                    Pelayanan Kesehatan<br>Profesional & Terpercaya
                </h1>

                <p class="text-blue-100 text-lg leading-relaxed">
                    Kami memberikan pelayanan medis terbaik dengan tenaga profesional, fasilitas lengkap,
                    serta komitmen terhadap keselamatan dan kenyamanan pasien.
                </p>
            </div>

            {{-- Doctor Image --}}
            <div class="mt-12 md:mt-0 animate-float">
                <img src="{{ asset('img/dokter.jpg') }}"
                    alt="Doctor"
                    class="w-[360px] md:w-[450px] rounded-2xl shadow-2xl object-cover border border-white/20">
            </div>

        </div>
    </section>

    {{-- ======================= FITUR UTAMA ======================= --}}
    <section class="py-20 px-8 lg:px-24 bg-white">

        <div class="text-center mb-14">
            <h5 class="uppercase tracking-widest font-semibold text-blue-600">Pelayanan Utama</h5>
            <h2 class="text-4xl sm:text-5xl font-bold text-blue-900 mt-2">Solusi Untuk Kesehatan Anda</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Card 1 --}}
            <a href="/janjiTemu"
                class="group bg-white shadow-md hover:shadow-xl border border-gray-100 p-10 rounded-2xl transition transform hover:-translate-y-1">
                <div class="flex justify-center">
                    <div class="p-4 bg-blue-100 rounded-full mb-4">
                        <span class="text-4xl">📅</span>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-blue-900 text-center">Buat Janji Temu</h3>
                <p class="text-gray-600 text-center mt-2">Atur jadwal pemeriksaan dengan cepat dan mudah.</p>
            </a>

            {{-- Card 2 --}}
            <a href="/dokter"
                class="group bg-white shadow-md hover:shadow-xl border border-gray-100 p-10 rounded-2xl transition transform hover:-translate-y-1">
                <div class="flex justify-center">
                    <div class="p-4 bg-blue-100 rounded-full mb-4">
                        <span class="text-4xl">🩺</span>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-blue-900 text-center">Klaster Dokter</h3>
                <p class="text-gray-600 text-center mt-2">Temukan dokter terbaik sesuai kebutuhan Anda.</p>
            </a>

            {{-- Card 3 --}}
            <a href="#aduan"
                class="group bg-white shadow-md hover:shadow-xl border border-gray-100 p-10 rounded-2xl transition transform hover:-translate-y-1">
                <div class="flex justify-center">
                    <div class="p-4 bg-blue-100 rounded-full mb-4">
                        <span class="text-4xl">💬</span>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-blue-900 text-center">Aduan Pelayanan</h3>
                <p class="text-gray-600 text-center mt-2">Sampaikan masukan untuk peningkatan layanan.</p>
            </a>

        </div>
    </section>

    {{-- ======================= SECTION TENTANG ======================= --}}
    <section class="bg-gray-50 py-20 px-8 lg:px-24">

        <div class="max-w-4xl mx-auto text-center space-y-6 animate-fade-up">
            <h5 class="uppercase tracking-widest font-semibold text-blue-600">
                Selamat Datang di Okemas
            </h5>

            <h2 class="text-4xl sm:text-5xl font-bold text-blue-900">
                Pelayanan Kesehatan Terintegrasi & Profesional
            </h2>

            <p class="text-gray-700 text-lg leading-relaxed">
                Puskesmas kami berkomitmen memberikan layanan kesehatan yang ramah, cepat, dan terjangkau.
                Dengan tenaga medis profesional serta fasilitas modern, kami menyediakan layanan dari pemeriksaan
                umum, imunisasi, gizi, hingga penanganan darurat.
            </p>

            <a href="#" class="text-blue-600 font-semibold hover:underline">Pelajari Lebih Lanjut →</a>
        </div>

    </section>

    {{-- ======================= GAMBAR ILUSTRASI ======================= --}}
    <div class="w-full flex justify-center py-16">
        <img src="{{ asset('img/oke.avif') }}" class="rounded-xl shadow-xl w-[850px] animate-float">
    </div>

    {{-- ======================= LAYANAN DETAIL ======================= --}}
    <section class="py-20 px-8 lg:px-24">

        <div class="text-center mb-14 animate-fade-up">
            <h5 class="uppercase tracking-widest font-semibold text-blue-600">
                Pelayanan Kesehatan Terpercaya
            </h5>

            <h2 class="text-4xl sm:text-5xl font-bold text-blue-900 mt-3">
                Layanan Kami
            </h2>
        </div>

        <div class="flex flex-col md:flex-row items-start justify-between gap-10">

            {{-- Text --}}
            <div class="max-w-xl animate-fade-up">
                <h3 class="text-3xl font-bold text-blue-900 mb-4">
                    Kami Selalu Mengutamakan Pasien
                </h3>

                <ul class="text-lg space-y-2 text-gray-700">
                    <li>• Dedikasi untuk kesembuhan pasien</li>
                    <li>• Pelayanan profesional & manusiawi</li>
                    <li>• Fasilitas modern & terstandarisasi</li>
                    <li>• Tim medis berpengalaman</li>
                    <li>• Respons cepat & terukur</li>
                    <li>• Komitmen dalam setiap pelayanan</li>
                </ul>

                <p class="text-gray-700 mt-4 leading-relaxed">
                    Kami selalu memastikan setiap pasien mendapatkan perhatian optimal
                    melalui pelayanan yang cepat, ramah, serta prosedur yang aman.
                </p>
            </div>

            {{-- Images --}}
            <div class="flex flex-col gap-6 animate-float">
                <img src="{{ asset('img/dokterSatu.jpeg') }}"
                    class="w-[430px] rounded-xl shadow-lg object-cover hover:scale-105 transition-transform duration-500">
                <img src="{{ asset('img/dokterDua.jpg') }}"
                    class="w-[430px] rounded-xl shadow-lg object-cover hover:scale-105 transition-transform duration-500">
            </div>

        </div>
    </section>

    {{-- ======================= ANIMASI STYLE ======================= --}}
    <style>
        .animate-fade-up {
            animation: fadeUp 1s ease forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>

</x-layout>