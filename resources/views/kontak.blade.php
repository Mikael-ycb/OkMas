<x-layout>

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
    
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-10">Hubungi Kami</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Formulir -->
                <form class="bg-blue-900 rounded-md overflow-hidden text-white">
                    <div class="grid grid-cols-2 border-b border-blue-700">
                        <input type="text" placeholder="Nama" class="bg-transparent px-4 py-3 w-full focus:outline-none border-r border-blue-700">
                        <input type="email" placeholder="Email" class="bg-transparent px-4 py-3 w-full focus:outline-none">
                    </div>
                    <div class="border-b border-blue-700">
                        <input type="text" placeholder="Subjek" class="bg-transparent px-4 py-3 w-full focus:outline-none">
                    </div>
                    <div class="border-b border-blue-700">
                        <textarea placeholder="Pesan" rows="4" class="bg-transparent px-4 py-3 w-full focus:outline-none"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-200 text-blue-900 w-full py-3 font-semibold hover:bg-blue-300 transition">
                        SUBMIT
                    </button>
                </form>

                <!-- Info Kontak -->
                <div class="grid grid-cols-2 gap-4">

                    <!-- Emergency -->
                    <div class="bg-blue-200 rounded-md p-6">
                        <div class="flex flex-col items-start space-y-2">
                            <i class="fas fa-phone text-2xl text-blue-900"></i>
                            <h3 class="font-bold text-blue-900 uppercase">Emergency</h3>
                            <p class="text-gray-800">(0293)5921484</p>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="bg-blue-900 text-white rounded-md p-6">
                        <div class="flex flex-col items-start space-y-2">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                            <h3 class="font-bold uppercase">Lokasi</h3>
                            <p>Jln. Pesanggrahan No 2,<br> Ds. Candiroto</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="bg-blue-200 rounded-md p-6">
                        <div class="flex flex-col items-start space-y-2">
                            <i class="fas fa-envelope text-2xl text-blue-900"></i>
                            <h3 class="font-bold text-blue-900 uppercase">Email</h3>
                            <p class="text-gray-800">puskescdrt@gmail.com</p>
                        </div>
                    </div>

                    <!-- Jam Kerja -->
                    <div class="bg-blue-200 rounded-md p-6">
                        <div class="flex flex-col items-start space-y-2">
                            <i class="fas fa-clock text-2xl text-blue-900"></i>
                            <h3 class="font-bold text-blue-900 uppercase">Jam Kerja</h3>
                            <p class="text-gray-800">
                                Sen–Sab 07:00–14:00 <br>
                                UGD 24 Jam
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</x-layout>