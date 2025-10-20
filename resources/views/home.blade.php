<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="relative bg-cover bg-center bg-no-repeat h-[650px] w-full"
        style="background-image: url('{{ asset('img/hehe1.jpg') }}');">

        <div class="absolute inset-0 bg-blue-900/70"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-200">Caring for Life</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight">
                    Leading the Way in <br> Medical Excellence
                </h1>
                <p class="text-blue-100 text-lg">
                    Kami berkomitmen memberikan pelayanan sunat dengan penuh kasih sayang terbaik
                    dengan tenaga cantik dan fasilitas modern.
                </p>
                <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-6">
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-medium shadow-md transition">
                        Our Services
                    </a>
                </div>
                <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-6">
                    <a href="#" class="bg-white text-blue-700 hover:bg-gray-100 px-6 py-3 rounded-md font-medium shadow-md transition">Book an Appointment</a>
                    <a href="#" class="bg-white text-blue-700 hover:bg-gray-100 px-6 py-3 rounded-md font-medium shadow-md transition">Book an Appointment</a>
                    <a href="#" class="bg-white text-blue-700 hover:bg-gray-100 px-6 py-3 rounded-md font-medium shadow-md transition">Book an Appointment</a>
                </div>
            </div>

            <div class="mt-10 md:mt-0 flex justify-center md:justify-end w-full md:w-1/2">
                <img src="{{ asset('img/dokter.jpg') }}"
                     alt="Doctor"
                     class="w-[400px] md:w-[480px] rounded-lg shadow-lg object-cover">
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold">Home Page</h1>
        <p class="mt-2 text-gray-700">Ini Halaman Beranda</p>
    </div>
</x-layout>
