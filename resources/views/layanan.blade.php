<x-layout>
    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-900">Beranda / Layanan</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    Layanan
                </h1>

            </div>
    </section>

    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Kartu 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('img/bidan.jpg') }}" alt="Bidan" class="w-full h-56 object-cover">
                        <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                            <div class="bg-blue-900 text-white rounded-full p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.1 0-2 .9-2 2 0 1.4 2 3.5 2 3.5s2-2.1 2-3.5c0-1.1-.9-2-2-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="pt-8 pb-6 px-6 text-center">
                        <h3 class="text-lg font-semibold text-gray-900">Bidan</h3>
                        <p class="text-gray-600 mb-4">Klaster Bidan</p>
                        <a href="#" class="text-blue-600 font-medium inline-flex items-center hover:underline">
                            Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('img/umum.jpg') }}" alt="Umum" class="w-full h-56 object-cover">
                        <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                            <div class="bg-blue-900 text-white rounded-full p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.1 0-2 .9-2 2 0 1.4 2 3.5 2 3.5s2-2.1 2-3.5c0-1.1-.9-2-2-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="pt-8 pb-6 px-6 text-center">
                        <h3 class="text-lg font-semibold text-gray-900">Umum</h3>
                        <p class="text-gray-600 mb-4">Klaster Umum</p>
                        <a href="#" class="text-blue-600 font-medium inline-flex items-center hover:underline">
                            Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('img/gigi.jpg') }}" alt="Gigi dan Mulut" class="w-full h-56 object-cover">
                        <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                            <div class="bg-blue-900 text-white rounded-full p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.1 0-2 .9-2 2 0 1.4 2 3.5 2 3.5s2-2.1 2-3.5c0-1.1-.9-2-2-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="pt-8 pb-6 px-6 text-center">
                        <h3 class="text-lg font-semibold text-gray-900">Gigi dan Mulut</h3>
                        <p class="text-gray-600 mb-4">Klaster Gigi dan Mulut</p>
                        <a href="#" class="text-blue-600 font-medium inline-flex items-center hover:underline">
                            Selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layout>