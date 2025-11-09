<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Update Berita</h2>
    </section>

    <div class="px-20 pb-20 bg-white min-h-screen">
        <form action="{{ isset($berita) ? route('berita.update', $berita->id) : route('berita.store') }}"
              method="POST" enctype="multipart/form-data"
              class="bg-white shadow-md rounded-xl border border-gray-200 p-8 max-w-4xl mx-auto">
            @csrf
            @if(isset($berita)) @method('PUT') @endif

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Judul Berita</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Program</label>
                <input type="text" name="program" value="{{ old('program', $berita->program ?? '') }}" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Upload Gambar (.JPG)</label>
                <input type="file" name="gambar" accept=".jpg,.jpeg" class="w-full border rounded p-2">
                @if(isset($berita) && $berita->gambar)
                    <p class="text-sm text-gray-600 mt-2">Gambar saat ini: <span class="font-semibold">{{ $berita->gambar }}</span></p>
                @endif
            </div>

            <div class="mb-6">
                <label class="block font-medium text-gray-700 mb-1">Isi Berita</label>
                <textarea name="isi" rows="8" class="w-full border rounded p-2" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('berita.index') }}" class="bg-gray-300 text-black px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
                <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800">Simpan</button>
            </div>
        </form>
    </div>
</x-layout4>
