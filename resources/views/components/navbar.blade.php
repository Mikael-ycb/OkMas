<nav class="fixed top-[80px] left-0 w-full z-40 bg-blue-900 shadow">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            {{-- Left navbar links --}}
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
                        <x-nav-link href="/tentangKami" :active="request()->is('tentangKami')">Tentang Kami</x-nav-link>
                        <x-nav-link href="/layanan" :active="request()->is('layanan')">Layanan</x-nav-link>
                        <x-nav-link href="/dokter" :active="request()->is('dokter')">Dokter</x-nav-link>
                        <x-nav-link href="/berita" :active="request()->is('berita')">Berita</x-nav-link>
                        <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>



                        {{-- Jika pasien login munculkan menu Laporan --}}
                        @if(Auth::check() && Auth::user()->role === 'pasien')
                        <x-nav-link href="/laporan" :active="request()->is('laporan')">Laporan</x-nav-link>
                        @endif

                    </div>
                </div>
            </div>

            {{-- Right section (Notification + Profile / Login) --}}
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    {{-- Notifikasi --}}
                    @php
                    // Hanya hitung notifikasi untuk pasien yang sedang login
                    $notifCount = 0;
                    if(Auth::check() && Auth::user()->role === 'pasien') {
                    $notifCount = \App\Models\NotifikasiPasien::where('user_id', Auth::id())
                    ->where('is_read', false)
                    ->count();
                    }
                    @endphp

                    <a href="{{ route('pasien.notifikasi') }}" class="relative rounded-full p-1 text-gray-300 hover:text-white">
                        <span class="absolute -inset-1.5"></span>

                        {{-- ICON BEL --}}
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            aria-hidden="true" class="size-6">
                            <path d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0018 9.75V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        {{-- BADGE JUMLAH NOTIFIKASI --}}
                        @if($notifCount > 0)
                        <span class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] px-1.5 py-0.5 rounded-full">
                            {{ $notifCount }}
                        </span>
                        @endif
                    </a>


                    {{-- PROFILE / LOGIN --}}
                    @if(!Auth::check())
                    {{-- Belum Login --}}
                    <a href="/login"
                        class="bg-white text-blue-900 font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-100 ml-4 transition">
                        Login
                    </a>
                    @else
                    {{-- Sudah Login --}}
                    <el-dropdown class="relative ml-4">
                        <button
                            class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            <span class="absolute -inset-1.5"></span>
                            <img
                                src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}&background=1e3a8a&color=fff"
                                class="size-8 rounded-full outline -outline-offset-1 outline-white/10">
                        </button>

                        <el-menu anchor="bottom end" popover
                            class="w-48 origin-top-right rounded-md bg-gray-800 py-1 outline outline-1 outline-white/10">

                            <p class="px-4 py-2 text-sm text-gray-300">
                                {{ Auth::user()->username }}
                            </p>

                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
                                Profil
                            </a>

                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
                                Keluar
                            </a>
                        </el-menu>
                    </el-dropdown>
                    @endif

                </div>
            </div>

            {{-- Mobile menu button --}}
            <div class="-mr-2 flex md:hidden">
                <button command="--toggle" commandfor="mobile-menu"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-300 hover:bg-white/5 hover:text-white">
                    <span class="absolute -inset-0.5"></span>
                    <svg class="size-6 in-aria-expanded:hidden" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg class="size-6 not-in-aria-expanded:hidden" fill="none" stroke="currentColor"
                        stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M6 18 18 6M6 6l12 12"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- MOBILE MENU --}}
    <el-disclosure id="mobile-menu" hidden class="block md:hidden">

        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">

            <a href="/" class="nav-mobile {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
            <a href="/tentangKami" class="nav-mobile {{ request()->is('tentangKami') ? 'active' : '' }}">Tentang Kami</a>
            <a href="/layanan" class="nav-mobile {{ request()->is('layanan') ? 'active' : '' }}">Layanan</a>
            <a href="/dokter" class="nav-mobile {{ request()->is('dokter') ? 'active' : '' }}">Dokter</a>
            <a href="/berita" class="nav-mobile {{ request()->is('berita') ? 'active' : '' }}">Berita</a>
            <a href="/kontak" class="nav-mobile {{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>

            @if(Auth::check() && Auth::user()->role === 'pasien')
            <a href="/laporan" class="nav-mobile {{ request()->is('laporan') ? 'active' : '' }}">Laporan</a>
            @endif
        </div>

        <div class="border-t border-white/10 pt-4 pb-3">
            {{-- PROFILE / LOGIN --}}
            @if(!Auth::check())
            {{-- Belum Login --}}
            <a href="/login"
                class="bg-white text-blue-900 font-semibold px-4 py-2 rounded-lg shadow hover:bg-gray-100 ml-4 transition">
                Login
            </a>
            @else
            {{-- Sudah Login --}}
            <el-dropdown class="relative ml-4">
                <button
                    class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    <span class="absolute -inset-1.5"></span>
                    <img
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}&background=1e3a8a&color=fff"
                        class="size-8 rounded-full outline -outline-offset-1 outline-white/10">
                </button>

                <el-menu anchor="bottom end" popover
                    class="w-48 origin-top-right rounded-md bg-gray-800 py-1 outline outline-1 outline-white/10">

                    <p class="px-4 py-2 text-sm text-gray-300">
                        {{ Auth::user()->username }}
                    </p>

                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
                        Profil
                    </a>

                    <a href="/logout" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5">
                        Keluar
                    </a>
                </el-menu>
            </el-dropdown>
            @endif


        </div>

    </el-disclosure>

</nav>

{{-- Style tambahan --}}
<style>
    .nav-mobile {
        @apply block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white;
    }

    .nav-mobile.active {
        @apply bg-gray-950/50 text-white;
    }
</style>