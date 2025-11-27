<x-layout>

    <style>
        /* === GLASS EFFECT === */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* === SPLIT REVEAL LEFT === */
        @keyframes splitLeftReveal {
            0% {
                opacity: 0;
                transform: translateX(-60px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* === SPLIT REVEAL RIGHT === */
        @keyframes splitRightReveal {
            0% {
                opacity: 0;
                transform: translateX(60px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* === OPACITY STAGGER === */
        @keyframes staggerFade {
            0% {
                opacity: 0;
                transform: translateY(15px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* === 3D TILT IMAGE === */
        .tilt {
            transition: transform .25s ease-out;
            transform-style: preserve-3d;
        }

        .tilt:hover {
            transform: rotateY(8deg) rotateX(-8deg) scale(1.03);
        }

        /* === BORDER GLOW PULSE === */
        @keyframes glowPulse {
            0% {
                box-shadow: 0 0 0px rgba(59, 130, 246, 0.0);
            }

            50% {
                box-shadow: 0 0 25px rgba(59, 130, 246, 0.4);
            }

            100% {
                box-shadow: 0 0 0px rgba(59, 130, 246, 0.0);
            }
        }

        .glow {
            animation: glowPulse 3s infinite ease-in-out;
        }
    </style>




    {{-- HERO SECTION --}}
    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">

        <div class="absolute inset-0 bg-black/10"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h5 class="uppercase tracking-widest font-semibold text-blue-900">
                    Beranda / Layanan / Detail Klaster
                </h5>

                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    {{ $data['judul'] }}
                </h1>
            </div>
        </div>
    </section>


    {{-- DETAIL SECTION --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            {{-- LEFT CONTENT / GLASS CARD --}}
            <div id="leftBox"
                class="opacity-0 glass glow p-10 rounded-2xl shadow-xl">

                <h2 id="judul" class="text-3xl font-extrabold text-blue-900 mb-4 opacity-0">
                    {{ $data['judul'] }}
                </h2>

                <p id="deskripsi" class="text-gray-700 text-lg leading-relaxed opacity-0">
                    {{ $data['deskripsi'] }}
                </p>

                <div id="tombol" class="opacity-0 mt-6">
                    <a href="/layanan"
                        class="inline-block bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                        Kembali ke Layanan
                    </a>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <div id="rightBox" class="opacity-0 flex justify-center">
                <img src="{{ $data['gambar'] }}"
                    alt="Dokter"
                    class="tilt w-[85%] max-w-md object-cover rounded-2xl shadow-xl">
            </div>

        </div>
    </section>


    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const left = document.getElementById("leftBox");
            const right = document.getElementById("rightBox");

            const judul = document.getElementById("judul");
            const desk = document.getElementById("deskripsi");
            const tombol = document.getElementById("tombol");

            // SPLIT REVEAL
            setTimeout(() => {
                left.style.animation = "splitLeftReveal 0.9s ease-out forwards";
                right.style.animation = "splitRightReveal 0.9s ease-out forwards";
            }, 200);

            // OPACITY STAGGER
            setTimeout(() => {
                judul.style.animation = "staggerFade .7s forwards";
            }, 500);
            setTimeout(() => {
                desk.style.animation = "staggerFade .7s forwards";
            }, 700);
            setTimeout(() => {
                tombol.style.animation = "staggerFade .7s forwards";
            }, 900);
        });
    </script>




</x-layout>