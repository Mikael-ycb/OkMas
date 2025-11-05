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
                    <a href="/janjiTemu" class="bg-white text-blue-700 hover:bg-gray-100 px-6 py-3 rounded-md font-medium shadow-md transition">Buat Janji</a>
                    <a href="#" class="bg-white text-blue-700 hover:bg-gray-100 px-6 py-3 rounded-md font-medium shadow-md transition">Aduan Pelayanan</a>
                </div>
            </div>

            <div class="mt-10 md:mt-0 flex justify-center md:justify-end w-full md:w-1/2">
                <img src="{{ asset('img/dokter.jpg') }}"
                    alt="Doctor"
                    class="w-[400px] md:w-[480px] rounded-lg shadow-lg object-cover">
            </div>
        </div>
    </section>

    <div class="relative z-10 flex flex-col items-center justify-center py-12 px-8 lg:px-20 text-center">
        <div class="max-w-3xl text-white space-y-6">
            <h5 class="uppercase tracking-widest font-semibold text-blue-400">
                <b>Selamat Datang di Okemas</b>
            </h5>
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                Untuk Kesehatan Anda <br> Mengutamakan Pelayanan, Menjaga Kehidupan
            </h1>
            <p class="text-black text-lg">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita assumenda itaque necessitatibus,
                dignissimos accusamus corporis consequatur distinctio suscipit, officia at illum ab.
                Eos similique voluptatem id unde hic magnam tempora?
            </p>
            <a href="" class="text-blue-400">Pelajari Lebih Lanjut -></a>
        </div>
    </div>
    <div class="mt-10 md:mt-0 flex justify-center items-center w-full">
        <img src="{{ asset('img/oke.avif') }}"
            alt="Doctor"
            class="w-[400px] md:w-[800px] rounded-lg shadow-lg object-cover">
    </div>

    <div class="relative z-10 flex flex-col items-center justify-center py-12 px-8 lg:px-20 text-center">
        <h5 class="uppercase tracking-widest font-semibold text-blue-400">
            <b>PELAYANAN KESEHATAN YANG TERPERCAYA</b>
        </h5>
        <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-black">
            Layanan Kami
        </h1>
    </div>

    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
        <div class="text-center md:text-left max-w-2xl text-white space-y-6">
            <h3 class="text-4xl sm:text-5xl font-bold leading-tight text-black">
                Kami Selalu Mengutamakan Pasien
            </h3>
            <ul class="text-black">
                <li>Dedikasi Untuk Penyembuhan</li>
                <li>Pelayanan Terbaik Kami</li>
                <li>Melayani Dengan Sepenuh Hati</li>
                <li>Pelayanan Berkualitas</li>
                <li>Percayakan Pada Kami</li>
                <li>Selalu Peduli</li>
            </ul>

            <p class="text-black text-lg">
                Puskesmas kami berkomitmen memberikan layanan kesehatan yang ramah, cepat, dan terjangkau. Dengan tenaga medis profesional serta fasilitas yang memadai, kami siap melayani mulai dari pemeriksaan rutin, layanan gizi, imunisasi, hingga penanganan darurat. Tidak hanya mengobati, kami juga mendampingi masyarakat untuk hidup lebih sehat dan sejahtera.
            </p>
        </div>

        <div class="mt-10 md:mt-0 flex flex-col items-center md:items-end w-full md:w-1/2">
            <img src="{{ asset('img/dokter.jpg') }}"
                alt="Doctor"
                class="w-[400px] md:w-[480px] rounded-lg shadow-lg object-cover mb-4">
            <img src="{{ asset('img/dokter.jpg') }}"
                alt="Doctor"
                class="w-[400px] md:w-[480px] rounded-lg shadow-lg object-cover">
        </div>

        

        <!-- <script>
            window.embeddedChatbotConfig = {
                chatbotId: "DSBtB6oZ5g55DkR0z28JR", // ganti dengan AGENT_ID kamu dari Chatbase
                domain: "www.chatbase.co", // gunakan domain proxy kamu
            };
        </script>

        <script
            src="https://www.chatbase.co/embed.min.js"
            chatbotId="your_agent_id_here"
            domain="localhost:3000"
            defer>
        </script> -->



</x-layout>