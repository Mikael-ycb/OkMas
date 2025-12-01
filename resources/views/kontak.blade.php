<x-layout>

    <section class="relative bg-cover bg-center h-[400px] w-full" style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col justify-center h-full max-w-7xl mx-auto px-6 lg:px-20 text-center md:text-left">
            <h5 class="uppercase tracking-widest font-semibold text-white mb-2" data-aos="fade-down" data-aos-delay="200">
                Beranda / Kontak
            </h5>
            <h1 class="text-4xl sm:text-5xl font-bold text-white leading-tight" data-aos="fade-up" data-aos-delay="400">
                Kontak
            </h1>
            <p class="text-white mt-4 max-w-2xl" data-aos="fade-up" data-aos-delay="600">
                Temukan berbagai layanan kesehatan unggulan dari rumah sakit kami, didukung oleh tenaga medis profesional dan fasilitas modern.
            </p>
        </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-10">Hubungi Kami</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">


                <!-- Formulir -->
                <form action="{{ route('kontak.store') }}" method="POST"
                    class="bg-white rounded-xl shadow-xl border border-gray-200 p-8">
                    @csrf

                    <h2 class="text-2xl font-bold text-blue-900 mb-6">Kirim Pesan</h2>

                    <input type="hidden" name="nama" value="{{ auth()->user()->nama }}">

                    {{-- Input Email --}}
                    <div class="mb-5">
                        <label class="block text-blue-900 font-semibold mb-2">Email</label>
                        <input type="email" name="email"
                            class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan email Anda" required>
                    </div>

                    {{-- Subjek --}}
                    <div class="mb-5">
                        <label class="block text-blue-900 font-semibold mb-2">Subjek</label>
                        <input type="text" name="subjek"
                            class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Judul pesan Anda" required>
                    </div>

                    {{-- Pesan --}}
                    <div class="mb-6">
                        <label class="block text-blue-900 font-semibold mb-2">Pesan</label>
                        <textarea name="pesan" rows="5"
                            class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Tuliskan pesan Anda..." required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-900 text-white font-semibold py-3 rounded-lg hover:bg-blue-800 transition">
                        Kirim Pesan
                    </button>

                    @if (session('success'))
                    <div class="mt-4 p-4 bg-green-100 border border-green-300 text-green-900 rounded-lg">
                        {{ session('success') }}
                    </div>
                    @endif

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
    </section>


</x-layout>