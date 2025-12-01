<x-layout>

    <style>
        .fade-in {
            animation: fadeIn .6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Sidebar Hover */
        .sidebar-item:hover {
            background: #e8f0ff;
        }
    </style>

    <div class="min-h-screen bg-gray-100 flex">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white shadow-xl border-r fade-in">

            <div class="p-6 border-b">
                <h1 class="text-2xl font-bold text-blue-900">Dashboard</h1>
                <p class="text-gray-500 text-sm mt-1">Profil Pengguna</p>
            </div>

            <nav class="mt-6">
                <ul class="space-y-1">

                    <li>
                        <div class="sidebar-item flex items-center gap-3 px-6 py-3 text-blue-900 font-semibold cursor-pointer transition">
                            <div class="w-2 h-2 bg-blue-900 rounded-full"></div>
                            Profil
                        </div>
                    </li>

                    <li>
                        <a href="{{ url()->previous() }}"
                            class="flex items-center gap-3 px-6 py-3 text-gray-700 hover:bg-gray-200 transition">
                            ← Kembali
                        </a>
                    </li>

                </ul>
            </nav>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-10 fade-in">

            {{-- HEADER --}}
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-blue-900">Informasi Pengguna</h2>
                <p class="text-gray-600">Detail akun Anda tampil pada dashboard ini.</p>
            </div>

            {{-- TOP CARD WITH AVATAR --}}
            <div class="bg-white shadow-md rounded-2xl p-8 border border-gray-200 flex gap-6 items-center mb-10">

                {{-- Avatar --}}
                <div class="w-28 h-28 rounded-full bg-gradient-to-br from-blue-500 to-blue-900 text-white
                            flex items-center justify-center text-4xl font-bold shadow-md">
                    {{ strtoupper(substr($akun->nama, 0, 1)) }}
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-blue-900">{{ $akun->nama }}</h3>
                    <p class="text-gray-600 capitalize">{{ $akun->role }}</p>
                    <p class="text-gray-500 text-sm mt-1">ID Akun: {{ $akun->id_akun }}</p>
                </div>

            </div>

            {{-- 3 COLUMN GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h4 class="text-sm font-semibold text-blue-900">NIK</h4>
                    <p class="text-gray-700 mt-1">{{ $akun->nik }}</p>
                </div>

                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h4 class="text-sm font-semibold text-blue-900">Tanggal Lahir</h4>
                    <p class="text-gray-700 mt-1">{{ $akun->tanggal_lahir }}</p>
                </div>

                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h4 class="text-sm font-semibold text-blue-900">Jenis Kelamin</h4>
                    <p class="text-gray-700 mt-1">{{ $akun->jenis_kelamin }}</p>
                </div>

                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h4 class="text-sm font-semibold text-blue-900">Pekerjaan</h4>
                    <p class="text-gray-700 mt-1">{{ $akun->pekerjaan }}</p>
                </div>

                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h4 class="text-sm font-semibold text-blue-900">Nomor Telepon</h4>
                    <p class="text-gray-700 mt-1">{{ $akun->no_telepon }}</p>
                </div>

                <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                    <h4 class="text-sm font-semibold text-blue-900">Alamat</h4>
                    <p class="text-gray-700 mt-1">{{ $akun->alamat }}</p>
                </div>

            </div>

        </main>
    </div>

</x-layout>