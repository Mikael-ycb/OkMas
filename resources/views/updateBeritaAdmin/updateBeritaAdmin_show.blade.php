<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Tampilan Berita</h2>
    </section>

    <div class="px-20 pb-20 bg-white min-h-screen flex flex-col items-center">
        @if($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="rounded-xl w-[500px] shadow mb-6">
        @endif

        <div class="max-w-3xl text-gray-800 leading-relaxed">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">{{ $berita->judul }}</h2>
            <p class="text-sm text-gray-500 mb-4">{{ $berita->tanggal->format('d F Y') }}</p>
            <p>{{ $berita->isi }}</p>
        </div>

        <div class="flex justify-end w-full max-w-3xl mt-8">
            <a href="{{ route('berita.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Kembali</a>
        </div>
    </div>
</x-layout4>
