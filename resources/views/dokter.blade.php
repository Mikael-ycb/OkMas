<x-layout>
    <section class="relative bg-cover bg-center h-[400px] w-full" style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col justify-center h-full max-w-7xl mx-auto px-6 lg:px-20 text-center md:text-left">
            <h5 class="uppercase tracking-widest font-semibold text-white mb-2" data-aos="fade-down" data-aos-delay="200">
                Beranda / Dokter
            </h5>
            <h1 class="text-4xl sm:text-5xl font-bold text-white leading-tight" data-aos="fade-up" data-aos-delay="400">
                Dokter
            </h1>
            <p class="text-white mt-4 max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                Temukan berbagai layanan kesehatan unggulan dari rumah sakit kami, didukung oleh tenaga medis profesional dan fasilitas modern.
            </p>
        </div>
    </section>
    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Tim Dokter Kami</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($dokters as $dokter)
                <!-- Kartu Dokter -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ asset($dokter->photo) }}" alt="{{ $dokter->nama_dokter }}" class="w-full h-80 object-cover">
                    <div class="bg-blue-200 py-6 text-center">
                        <h3 class="text-gray-800 font-medium text-lg">{{ $dokter->nama_dokter }}</h3>
                        <p class="text-blue-900 font-extrabold tracking-widest">{{ $dokter->klaster->nama ?? 'N/A' }}</p>

                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-500 col-span-3">Tidak ada dokter ditemukan</p>
                @endforelse

            </div>
        </div>
    </section>

</x-layout>