<x-layout>
    {{-- Hero Section --}}
    <section class="relative bg-cover bg-center bg-no-repeat h-[400px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0 bg-black/40"></div> {{-- overlay gelap --}}

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-center h-full px-8 lg:px-20 text-center md:text-left">
            <div class="max-w-2xl text-white space-y-4 animate-fadeIn">
                <h5 class="uppercase tracking-widest font-semibold text-blue-300">Beranda / Berita</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-white">
                    Berita Terkini
                </h1>
                <p class="text-gray-200">Informasi terbaru seputar kesehatan, layanan rumah sakit, dan edukasi bagi masyarakat.</p>
            </div>
        </div>
    </section>

    {{-- Konten Berita --}}
    <div class="max-w-6xl mx-auto space-y-14 px-4 mt-14">
        @foreach ($berita as $item)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-2xl animate-slideUp">

            {{-- Gambar --}}
            <div class="relative group overflow-hidden">
                <img src="{{ asset('storage/' . $item->gambar) }}"
                    class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110"
                    alt="{{ $item->judul }}">

                <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>

            {{-- Konten --}}
            <div class="p-6">
                <div class="flex items-center text-gray-500 text-sm mb-3 space-x-4">
                    <i class="fa-solid fa-calendar-days text-blue-800"></i>
                    <span>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
                </div>

                <h2 class="text-2xl font-bold text-blue-900 mb-3 hover:text-blue-700 transition-colors">
                    {{ $item->judul }}
                </h2>

                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ Str::limit($item->isi, 250) }}
                </p>

                <a href="{{ route('beritaDetail', $item->id) }}"
                    class="inline-flex items-center px-6 py-2 bg-blue-200 text-blue-900 
                          font-semibold rounded-md hover:bg-blue-300 hover:text-white transition">
                    Baca selengkapnya →
                </a>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Animasi Tailwind --}}
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slideUp {
            animation: slideUp 0.8s ease-out forwards;
        }
    </style>
</x-layout>