<x-layout>

    <style>
        /* Animasi masuk (fade + slide up) */
        .notif-card {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeSlide .4s ease-out forwards;
        }

        @keyframes fadeSlide {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi hover */
        .notif-card:hover {
            transform: translateY(0) scale(1.01);
            transition: 0.2s ease;
        }

        /* Animasi saat dihapus */
        .fade-out {
            animation: fadeOut .3s forwards ease-out;
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateX(20px);
            }
        }
    </style>

    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">NOTIFIKASI</h1>
        <p class="text-gray-600 mt-1">Informasi terbaru untuk Anda</p>
    </section>

    <div class="px-20 pb-20 bg-gray-50 min-h-screen">

        @if($notif->count() === 0)
            <div class="text-center mt-10 text-gray-600">
                <p>Tidak ada notifikasi baru</p>
            </div>
        @endif

        @foreach($notif as $n)
            <div class="notif-card p-4 bg-white border rounded-xl mb-3 shadow-sm transition">

                <div class="flex justify-between items-start">

                    {{-- Judul & waktu --}}
                    <div class="max-w-3xl">
                        <a href="{{ route('beritaDetail', $n->berita_id) }}"
                            class="font-semibold text-blue-900 text-lg">
                            {{ $n->judul }}
                        </a>

                        <p class="text-sm text-gray-600 mt-2">
                            {{ $n->created_at->diffForHumans() }}
                        </p>

                        @unless($n->is_read)
                            <span class="text-red-600 text-xs font-semibold bg-red-100 px-2 py-1 rounded-lg inline-block mt-2">
                                Baru
                            </span>
                        @endunless
                    </div>

                    {{-- Tombol Hapus --}}
                    <div class="ml-4 flex items-start">
                        <form action="{{ route('notifikasi.destroy', $n->id) }}"
                              method="POST"
                              class="delete-form">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-500 hover:text-red-700 text-xl leading-none">
                                🗑️
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        @endforeach

    </div>

    <!-- Script animasi delete -->
    <script>
        document.querySelectorAll(".delete-form").forEach(form => {
            form.addEventListener("submit", function(e) {
                e.preventDefault();

                if (confirm("Hapus notifikasi ini?")) {
                    let card = this.closest(".notif-card");

                    // Tambahkan efek fade-out
                    card.classList.add("fade-out");

                    // Submit setelah animasi selesai
                    setTimeout(() => form.submit(), 300);
                }
            });
        });
    </script>

</x-layout>
