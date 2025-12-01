<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <style>
        /* === GLASS EFFECT === */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* === GLOW EFFECT === */
        @keyframes glowPulse {

            0%,
            100% {
                box-shadow: 0 0 0px rgba(59, 130, 246, 0.0);
            }

            50% {
                box-shadow: 0 0 25px rgba(59, 130, 246, 0.3);
            }
        }

        .glow {
            animation: glowPulse 3s infinite ease-in-out;
        }
    </style>

    <!-- HERO SECTION -->
    <section class="relative bg-cover bg-center h-[400px] w-full" style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col justify-center h-full max-w-7xl mx-auto px-6 lg:px-20 text-center md:text-left">
            <h5 class="uppercase tracking-widest font-semibold text-white mb-2" data-aos="fade-down" data-aos-delay="200">
                Beranda / Tentang Kami
            </h5>
            <h1 class="text-4xl sm:text-5xl font-bold text-white leading-tight" data-aos="fade-up" data-aos-delay="400">
                Tentang Kami
            </h1>
            <p class="text-white mt-4 max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                Temukan berbagai layanan kesehatan unggulan dari rumah sakit kami, didukung oleh tenaga medis profesional dan fasilitas modern.
            </p>
        </div>
    </section>

    <!-- CONTENT SECTION -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- LEFT IMAGE -->
            <div class="flex justify-center" data-aos="fade-right">
                <img src="{{ asset('img/ihi2.jpg') }}"
                    alt="Doctor"
                    class="w-[280px] md:w-[350px] rounded-xl shadow-lg object-cover hover:scale-105 transition-transform duration-500">
            </div>

            <!-- RIGHT GLASS CARD -->
            <div class="glass glow p-10 rounded-2xl shadow-xl space-y-6" data-aos="fade-left">
                <h2 class="text-2xl font-bold text-blue-400">SELAMAT DATANG DI PUKESMAS CANDIROTO</h2>
                <h3 class="text-4xl sm:text-5xl font-bold text-blue-900">Perawatan Terbaik Untuk Kesehatan Anda</h3>

                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Semangat Untuk Penyembuhan</li>
                    <li>Semua yang Terbaik Dari Kami</li>
                    <li>Kami Peduli</li>
                </ul>

                <p class="text-gray-700 text-lg">
                    Website ini merupakan Website resmi yang dikelola oleh Puskesmas Candiroto dalam memberikan informasi kepada masyarakat luas terhadap kegiatan Puskesmas Candiroto.
                </p>
            </div>

        </div>
    </section>

    <!-- MOTTO SECTION -->
    <section class="relative bg-cover bg-center h-[450px] w-full" style="background-image: url('{{ asset('img/hehe1.jpg') }}');">
        <div class="absolute inset-0 bg-blue-900/40"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-6 py-20">

            <div class="glass glow p-12 rounded-3xl text-center text-white" data-aos="zoom-in">
                <p class="text-blue-100 text-lg italic mb-4">
                    "Kami Hadir Memberikan pelayanan kesehatan yang ramah, cepat, dan terpercaya, karena kesehatan Anda adalah prioritas utama kami."
                </p>
                <p class="font-semibold text-white text-xl">Motto</p>
            </div>

        </div>
    </section>

    @push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
    @endpush

</x-layout>