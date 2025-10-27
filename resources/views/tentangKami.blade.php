<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-900">Beranda / Tentang Kami</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    Tentang Kami
                </h1>

            </div>
    </section>



    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
        <div class="mt-10 md:mt-0 flex flex-col items-center w-full md:w-1/2">
            <img src="{{ asset('img/ihi2.jpg') }}"
                alt="Doctor"
                class="w-[280px] md:w-[350px] rounded-lg shadow-lg object-cover mb-4">
        </div>
        <div class="text-center md:text-left max-w-2xl text-white space-y-6 ">
            <h1 class="text-2xl sm:text-2xl font-bold leading-tight text-blue-400">
                SELAMAT DATANG DI PUKESMAS CANDIROTO
            </h1>
            <h3 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                Perawatan Terbaik Untuk Kesehatan Anda Baik
            </h3>
            <ul class="text-black">
                <li>Semangat Untuk Penyembuhan</li>
                <li>Semua yang Terbaik Dari kami</li>
                <li>Kami Peduli</li>
            </ul>

            <p class="text-black text-lg">
                Website ini merupakan Website resmi yang dikelola oleh Puskesmas Candiroto Dalam memberikan informasi kepada masyarakat luas terhadap kegiatan Puskesmas Candiroto.
            </p>
        </div>
    </div>

    <section class="relative bg-cover bg-center bg-no-repeat h-[450px] w-full"
        style="background-image: url('{{ asset('img/hehe1.jpg') }}');">

        <div class="absolute inset-0 bg-blue-900/70"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center mx-auto max-w-2xl text-white space-y-6">
                <p class="text-blue-100 text-lg">
                    "Kami Hadir Memberikan pelayanan kesehatan yang ramah, cepay, dan terpercaya, karena kesehatan anda adalah prioritas utama kami."
                </p>
                <p>Motto</p>
        </div>
    </section>








</x-layout>