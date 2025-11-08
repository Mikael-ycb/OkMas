<nav class="fixed top-[80px] left-0 w-full z-40 bg-blue-900 shadow">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="/laporanAdmin" :active="request()->is('laporanAdmin')">Laporan</x-nav-link>
                        <x-nav-link href="/updateBeritaAdmin" :active="request()->is('updateBeritaAdmin')">Update Berita</x-nav-link>
                        <x-nav-link href="/daftarPeriksaAdmin" :active="request()->is('daftarPeriksaAdmin')">Daftar Periksa</x-nav-link>
                        <x-nav-link href="/akunPasienAdmin" :active="request()->is('akunPasienAdmin')">Akun Pasien</x-nav-link>
                        <x-nav-link href="/keluarAdmin" :active="request()->is('keluarAdmin')">Keluar</x-nav-link>
                    </div>
                </div>
            </div>

            <!-- Tombol menu mobile -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" command="--toggle" commandfor="mobile-menu"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- MENU MOBILE -->
    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <a href="/laporanAdmin"
                class="{{ request()->is('laporanAdmin') ? 'bg-blue-800 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                Laporan
            </a>
            <a href="/updateBeritaAdmin"
                class="{{ request()->is('updateBeritaAdmin') ? 'bg-blue-800 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                Update Berita
            </a>
            <a href="/daftarPeriksaAdmin"
                class="{{ request()->is('daftarPeriksaAdmin') ? 'bg-blue-800 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                Daftar Periksa
            </a>
            <a href="/akunPasienAdmin"
                class="{{ request()->is('akunPasienAdmin') ? 'bg-blue-800 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                Akun Pasien
            </a>
            <a href="/keluarAdmin"
                class="{{ request()->is('keluarAdmin') ? 'bg-blue-800 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                Keluar
            </a>
        </div>
    </el-disclosure>
</nav>
