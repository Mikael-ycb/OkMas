<x-layout>
    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-900">Beranda / Notifikasi</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    Notifikasi
                </h1>

            </div>
    </section>

    <div class="grid md:grid-cols-2 gap-6 p-6">
        <div class="flex items-start space-x-4 border-b pb-4">
            <img src="{{ asset('img/logo-puskesmas.png') }}" class="w-10 h-10 rounded-full" alt="logo">
            <div>
                <p class="text-gray-800 text-sm">
                    Jangan lupa untuk mengonsumsi obat sesuai resep dari dokter ya. Jika obat hampir habis,
                    Anda bisa mengajukan permintaan ulang melalui aplikasi OKMAS.
                </p>
                <p class="text-xs text-gray-500 mt-1">February 26, 2023</p>
            </div>
        </div>

        <div class="flex items-start space-x-4 border-b pb-4">
            <img src="{{ asset('img/logo-puskesmas.png') }}" class="w-10 h-10 rounded-full" alt="logo">
            <div>
                <p class="text-gray-800 text-sm">
                    Hasil pemeriksaan laboratorium Anda sudah tersedia. Silakan login ke aplikasi OKMAS
                    atau datang ke Puskesmas untuk informasi lebih lengkap.
                </p>
                <p class="text-xs text-gray-500 mt-1">February 26, 2023</p>
            </div>
        </div>

        <div class="flex items-start space-x-4 border-b pb-4">
            <img src="{{ asset('img/logo-puskesmas.png') }}" class="w-10 h-10 rounded-full" alt="logo">
            <div>
                <p class="text-gray-800 text-sm font-medium">
                    Halo Bunda, jadwal imunisasi anak Anda <span class="font-semibold">[Nama Anak]</span> adalah pada
                    <span class="font-semibold">5 Oktober 2025 pukul 08.00 WIB</span>.
                    Silakan datang ke Puskesmas Candiroto sesuai jadwal.
                </p>
                <p class="text-xs text-gray-500 mt-1">March 6, 2022</p>
            </div>
        </div>

        <div class="flex items-start space-x-4 border-b pb-4">
            <img src="{{ asset('img/logo-puskesmas.png') }}" class="w-10 h-10 rounded-full" alt="logo">
            <div>
                <p class="text-gray-800 text-sm font-medium">
                    Halo <span class="font-semibold">[Nama Pasien]</span>, Anda memiliki janji temu dengan
                    <span class="font-semibold">dr. [Nama Dokter]</span> pada Senin,
                    <span class="font-semibold">2 Oktober 2025 pukul 09.00 WIB</span> di Puskesmas Candiroto.
                    Mohon hadir 15 menit lebih awal.
                </p>
                <p class="text-xs text-gray-500 mt-1">March 1, 2023</p>
            </div>
        </div>
    </div>

</x-layout>