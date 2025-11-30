<x-layout>
    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-900">Beranda / Berita</h5>
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    Berita
                </h1>

            </div>
    </section>
    <div class="max-w-3xl mx-auto space-y-14 px-4 mt-10">

        @foreach ($berita as $item)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            <img src="{{ asset('storage/' . $item->gambar) }}"
                class="w-full h-64 object-cover"
                alt="{{ $item->judul }}">

            <div class="p-6">
                <div class="flex text-gray-500 text-sm mb-3 space-x-4">
                    <i class="fa-solid fa-calendar-days text-blue-800"></i>
                    <span>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</span>
                </div>

                <h2 class="text-2xl font-bold text-blue-900 mb-3">
                    {{ $item->judul }}
                </h2>

                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ Str::limit($item->isi, 200) }}
                </p>

                <a href="{{ route('beritaDetail', $item->id) }}"
                    class="inline-flex items-center px-5 py-2 bg-blue-200 text-blue-900 
                          font-semibold rounded-md hover:bg-blue-300 transition">
                    Baca selengkapnya →
                </a>
            </div>
        </div>
        @endforeach

    </div>
</x-layout>