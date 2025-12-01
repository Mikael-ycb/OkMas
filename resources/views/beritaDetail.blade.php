<x-layout>
    {{-- Hero Section --}}
    <section class="relative bg-cover bg-center bg-no-repeat h-[400px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0 bg-black/40"></div> {{-- overlay gelap --}}

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-center h-full px-8 lg:px-20 text-center md:text-left">
            <div class="max-w-2xl text-white space-y-4 animate-fadeIn">
                <h5 class="uppercase tracking-widest font-semibold text-blue-300">Beranda / Berita</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-white">
                    {{ $berita->judul }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Konten Detail Berita --}}
    <div class="max-w-4xl mx-auto space-y-10 px-4 mt-14 animate-slideUp">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            {{-- Gambar --}}
            @if ($berita->gambar)
            <div class="relative group overflow-hidden">
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                    class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-105"
                    alt="{{ $berita->judul }}">
                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>
            @endif

            {{-- Konten --}}
            <div class="p-8">
                {{-- Info tanggal & penulis --}}
                <div class="flex flex-wrap items-center text-gray-500 text-sm mb-4 space-x-6">
                    <div class="flex items-center">
                        <i class="fa-solid fa-calendar-days text-blue-800 mr-2"></i>
                        <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-user text-blue-800 mr-2"></i>
                        <span>Admin OKMAS</span>
                    </div>
                    @if ($berita->program)
                    <div class="flex items-center">
                        <i class="fa-solid fa-hospital text-blue-800 mr-2"></i>
                        <span class="text-blue-700 font-semibold">{{ $berita->program }}</span>
                    </div>
                    @endif
                </div>

                {{-- Judul --}}
                <h2 class="text-3xl font-bold text-blue-900 mb-6">{{ $berita->judul }}</h2>

                {{-- Isi lengkap --}}
                <p class="text-gray-700 leading-relaxed mb-6 whitespace-pre-line">
                    {{ $berita->isi }}
                </p>

                {{-- Tombol kembali --}}
                <a href="{{ route('berita') }}"
                    class="inline-flex items-center px-6 py-2 bg-blue-200 text-blue-900 
                          font-semibold rounded-md hover:bg-blue-300 hover:text-white transition">
                    ← Kembali ke daftar berita
                </a>
            </div>
        </div>
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