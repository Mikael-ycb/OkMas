<x-layout>
    <div class="max-w-3xl mx-auto space-y-14 px-4">

        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            {{-- Gambar --}}
            @if ($berita->gambar)
                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                     class="w-full h-64 object-cover"
                     alt="{{ $berita->judul }}">
            @endif

            <div class="p-6">

                {{-- Tanggal & info penulis (kalau mau) --}}
                <div class="flex flex-wrap items-center text-gray-500 text-sm mb-3 space-x-4">
                    <div class="flex items-center">
                        <i class="fa-solid fa-calendar-days text-blue-800 mr-2"></i>
                        <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-user text-blue-800 mr-2"></i>
                        <span>Admin OKMAS</span>
                    </div>
                </div>

                {{-- Judul --}}
                <h2 class="text-3xl font-bold text-blue-900 mb-4">
                    {{ $berita->judul }}
                </h2>

                {{-- Program (kalau ada) --}}
                @if ($berita->program)
                    <p class="text-sm text-blue-700 font-semibold mb-3">
                        {{ $berita->program }}
                    </p>
                @endif

                {{-- Isi lengkap --}}
                <p class="text-gray-700 leading-relaxed mb-6 whitespace-pre-line">
                    {{ $berita->isi }}
                </p>

                {{-- Tombol kembali --}}
                <a href="{{ route('berita') }}"
                   class="inline-flex items-center px-5 py-2 bg-blue-200 text-blue-900 
                          font-semibold rounded-md hover:bg-blue-300 transition">
                    ← Kembali ke daftar berita
                </a>
            </div>
        </div>

    </div>
</x-layout>
