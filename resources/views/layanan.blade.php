<x-layout>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[400px] w-full" style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col justify-center h-full max-w-7xl mx-auto px-6 lg:px-20 text-center md:text-left">
            <h5 class="uppercase tracking-widest font-semibold text-white mb-2" data-aos="fade-down" data-aos-delay="200">
                Beranda / Layanan
            </h5>
            <h1 class="text-4xl sm:text-5xl font-bold text-white leading-tight" data-aos="fade-up" data-aos-delay="400">
                Layanan Kami
            </h1>
            <p class="text-white mt-4 max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                Temukan berbagai layanan kesehatan unggulan dari rumah sakit kami, didukung oleh tenaga medis profesional dan fasilitas modern.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12" data-aos="fade-up">Layanan Unggulan</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

                <!-- Card Template -->
                @php
                $services = [
                ['title' => 'Bidan', 'desc' => 'Klaster Bidan', 'img' => 'bidan.jpg', 'link' => 'bidan'],
                ['title' => 'Umum', 'desc' => 'Klaster Umum', 'img' => 'umum.jpg', 'link' => 'umum'],
                ['title' => 'Gigi dan Mulut', 'desc' => 'Klaster Gigi dan Mulut', 'img' => 'gigi.jpg', 'link' => 'gigi'],
                ];
                @endphp

                @foreach($services as $index => $service)
                <div class="bg-white shadow-lg rounded-xl overflow-hidden transform hover:scale-105 transition-transform duration-500" data-aos="fade-up" data-aos-delay="{{ 200 * ($index+1) }}">
                    <div class="relative">
                        <img src="{{ asset('img/'.$service['img']) }}" alt="{{ $service['title'] }}" class="w-full h-64 object-cover">
                        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2">
                            <div class="bg-blue-900 text-white rounded-full p-5 shadow-md animate-bounce">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.1 0-2 .9-2 2 0 1.4 2 3.5 2 3.5s2-2.1 2-3.5c0-1.1-.9-2-2-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="pt-10 pb-8 px-6 text-center">
                        <h3 class="text-xl font-semibold text-gray-900">{{ $service['title'] }}</h3>
                        <p class="text-gray-600 mt-2 mb-4">{{ $service['desc'] }}</p>
                        <a href="{{ route('detailKlaster', ['jenis' => $service['link']]) }}" class="inline-flex items-center text-blue-600 font-medium hover:underline transition-all duration-300">
                            Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- AOS Animations -->
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