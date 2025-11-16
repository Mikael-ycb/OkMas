<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OKMAS Admin Dashboard</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        /* Sidebar Hidden / Show Animation (NO Tailwind Bug) */
        #sidebarMenu {
            left: -18rem; /* hidden */
            transition: left 0.3s ease;
        }
        #sidebarMenu.open {
            left: 0; /* show */
        }
    </style>
</head>

<body class="h-full">

    <!-- ================= NAVBAR ================= -->
    <nav class="fixed top-0 left-0 w-full h-16 bg-blue-900 text-white shadow 
                flex items-center px-6 z-50">
        <button onclick="toggleMenu()" 
                class="text-2xl p-2 rounded hover:bg-white/20 mr-4">
            ☰
        </button>
        <h1 class="text-xl font-bold">OKMAS Admin Dashboard</h1>
    </nav>

    <!-- ================= OVERLAY ================= -->
    <div id="overlayMenu"
         class="fixed inset-0 bg-black/40 hidden z-40"
         onclick="toggleMenu()">
    </div>

    <!-- ================= SIDEBAR ================= -->
    <aside id="sidebarMenu"
           class="fixed top-0 w-72 h-full bg-white shadow-xl border-r 
                  z-50">

        <!-- Header Sidebar -->
        <div class="h-16 flex items-center px-5 border-b bg-gray-50">
            <h2 class="font-bold text-blue-700 text-lg">MENU</h2>
        </div>

        <!-- Menu Items -->
        <nav class="p-4 space-y-1 overflow-y-auto h-[calc(100%-64px)]">

            <a href="/laporanAdmin" 
               class="flex items-center gap-3 px-4 py-3 font-medium hover:bg-blue-100 rounded-lg">
                📄 Laporan
            </a>

            <a href="/updateBeritaAdmin" 
               class="flex items-center gap-3 px-4 py-3 font-medium hover:bg-blue-100 rounded-lg">
                📰 Update Berita
            </a>

            <a href="/daftarPeriksaAdmin" 
               class="flex items-center gap-3 px-4 py-3 font-medium hover:bg-blue-100 rounded-lg">
                📋 Daftar Periksa
            </a>

            <a href="/akunPasienAdmin" 
               class="flex items-center gap-3 px-4 py-3 font-medium hover:bg-blue-100 rounded-lg">
                👤 Akun Pasien
            </a>

            <a href="/obatAdmin" 
               class="flex items-center gap-3 px-4 py-3 font-medium hover:bg-blue-100 rounded-lg">
                💊 Obat
            </a>

            <a href="/dokterAdmin" 
               class="flex items-center gap-3 px-4 py-3 font-medium hover:bg-blue-100 rounded-lg">
                🩺 Dokter
            </a>

            <a href="{{ route('logout') }}"
               onclick="return confirm('Yakin ingin keluar?')"
               class="flex items-center gap-3 px-4 py-3 font-medium text-red-500 hover:bg-red-100 rounded-lg">
                🚪 Keluar
            </a>

        </nav>
    </aside>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="pt-20 px-8">

        <div class="bg-white shadow border rounded-xl p-6">
            {{ $slot }}
        </div>

        <footer class="text-center text-gray-500 text-sm mt-10 mb-10">
            © 2025 OKMAS Admin Panel
        </footer>

    </main>


<!-- ================= SCRIPT ================= -->
<script>
function toggleMenu() {
    const sidebar = document.getElementById('sidebarMenu');
    const overlay = document.getElementById('overlayMenu');

    if (sidebar.classList.contains('open')) {
        sidebar.classList.remove('open');
        overlay.classList.add('hidden');
    } else {
        sidebar.classList.add('open');
        overlay.classList.remove('hidden');
    }
}
</script>

</body>
</html>
