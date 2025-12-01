<x-layout>

    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-900">Beranda / Kontak</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    Kontak
                </h1>

            </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-10">Hubungi Kami</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">


                <!-- Formulir -->
                <form action="{{ route('kontak.store') }}" method="POST" class="bg-blue-900 rounded-md overflow-hidden text-white">
                    @csrf

                    <div class="grid grid-cols-2 border-b border-blue-700">
                        <input type="hidden" name="nama" value="{{ auth()->user()->nama }}">
                        <input type="email" name="email" placeholder="Email" class="bg-transparent px-4 py-3 w-full focus:outline-none">
                    </div>

                    <div class="border-b border-blue-700">
                        <input type="text" name="subjek" placeholder="Subjek" class="bg-transparent px-4 py-3 w-full focus:outline-none">
                    </div>

                    <div class="border-b border-blue-700">
                        <textarea name="pesan" placeholder="Pesan" rows="4" class="bg-transparent px-4 py-3 w-full focus:outline-none"></textarea>
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
                @if (session('success'))
                <div class="mb-4 p-4 bg-green-200 text-green-900 rounded">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </section>


</x-layout>