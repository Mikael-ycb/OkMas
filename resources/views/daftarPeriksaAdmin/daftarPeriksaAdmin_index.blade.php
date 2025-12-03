<x-layout4>
    {{-- HEADER SECTION --}}
    <section class="px-6 md:px-20 pt-12 pb-8 bg-gradient-to-br from-slate-900 via-indigo-900 to-indigo-800">
        <h1 class="text-5xl font-black text-black mb-2 tracking-tight">📋 Manajemen Daftar Periksa</h1>
        <p class="text-indigo-100 text-lg">Kelola semua pemeriksaan pasien dan monitor status antrian</p>
    </section>

    <div class="px-6 md:px-20 pb-20 bg-gradient-to-b from-gray-50 to-black min-h-screen">
        
        {{-- FILTER SECTION --}}
        <div class="bg-black rounded-2xl shadow-lg p-8 mb-8 border-t-4 border-indigo-500">
            <h2 class="text-xl font-bold text-slate-900 mb-6">🔍 Filter Data</h2>
            <form id="filterForm" class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                {{-- Tanggal Filter --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2 text-sm uppercase tracking-wide">Pilih Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $tanggal }}" class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-indigo-500 focus:outline-none font-semibold">
                </div>

                {{-- Klaster Filter --}}
                <div>
                    <label class="block font-semibold text-gray-700 mb-2 text-sm uppercase tracking-wide">Pilih Klaster</label>
                    <select name="klaster" class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-indigo-500 focus:outline-none font-semibold bg-black">
                        <option value="Umum" {{ $klaster == 'Umum' ? 'selected' : '' }}>🩺 Umum (General)</option>
                        <option value="Gigi dan Mulut" {{ $klaster == 'Gigi dan Mulut' ? 'selected' : '' }}>🦷 Gigi dan Mulut (Dental)</option>
                        <option value="Bidan" {{ $klaster == 'Bidan' ? 'selected' : '' }}>👶 Bidan (Midwifery)</option>
                    </select>
                </div>

                {{-- Filter Button --}}
                <div>
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-black font-bold py-3 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                        🔍 Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        {{-- KLASTER HEADER WITH STATS --}}
        <div class="mb-8">
            @if($klaster == 'Umum')
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-center text-black">
                        <div>
                            <h2 class="text-3xl font-black">🩺 Klaster Umum</h2>
                            <p class="text-blue-100 mt-1">Layanan Kesehatan Umum</p>
                        </div>
                        <div class="text-6xl opacity-20">🩺</div>
                    </div>
                </div>
            @elseif($klaster == 'Gigi dan Mulut')
                <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-center text-black">
                        <div>
                            <h2 class="text-3xl font-black">🦷 Klaster Gigi & Mulut</h2>
                            <p class="text-pink-100 mt-1">Layanan Kesehatan Gigi dan Mulut</p>
                        </div>
                        <div class="text-6xl opacity-20">🦷</div>
                    </div>
                </div>
            @elseif($klaster == 'Bidan')
                <div class="bg-gradient-to-r from-rose-500 to-rose-600 rounded-2xl p-6 shadow-lg">
                    <div class="flex justify-between items-center text-black">
                        <div>
                            <h2 class="text-3xl font-black">👶 Klaster Bidan</h2>
                            <p class="text-rose-100 mt-1">Layanan Ibu dan Anak</p>
                        </div>
                        <div class="text-6xl opacity-20">👶</div>
                    </div>
                </div>
            @endif
        </div>

        {{-- DATA TABLE --}}
        <div id="tabelPeriksa">
            @include('daftarPeriksaAdmin.daftarPeriksaAdmin_partial_table')
        </div>
    </div>

    {{-- ⚡ AJAX Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterForm = document.querySelector('#filterForm');
            const tabelContainer = document.querySelector('#tabelPeriksa');

            // Update tabel saat filter berubah
            filterForm.addEventListener('change', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const params = new URLSearchParams(formData).toString();

                fetch(`{{ route('periksa.index') }}?${params}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => tabelContainer.innerHTML = html);
            });

            // Delegasi toggle status (biar bisa live tanpa reload)
            tabelContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('toggle-status')) {
                    e.preventDefault();
                    const id = e.target.dataset.id;

                    fetch(`/daftarPeriksaAdmin/toggle-status/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            e.target.textContent = data.status;
                            if (data.status === 'Aktif') {
                                e.target.classList.remove('bg-gray-400');
                                e.target.classList.add('bg-blue-900');
                            } else {
                                e.target.classList.remove('bg-blue-900');
                                e.target.classList.add('bg-gray-400');
                            }
                        }
                    });
                }
            });
        });
    </script>
</x-layout4>
