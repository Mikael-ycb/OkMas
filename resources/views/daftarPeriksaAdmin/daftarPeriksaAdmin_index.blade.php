<x-layout4>
    <section class="px-20 pt-12 pb-6 bg-white">
        <h1 class="text-3xl font-extrabold text-blue-900 uppercase tracking-wide">ADMIN</h1>
        <h2 class="text-2xl font-semibold text-blue-900 mt-1">Daftar Periksa</h2>
    </section>

    <div class="px-20 pb-20 bg-white min-h-screen">
        {{-- 🔍 Filter --}}
        <form id="filterForm" class="flex gap-4 mb-6 items-center">
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $tanggal }}" class="border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Klaster</label>
                <select name="klaster" class="border rounded px-3 py-2">
                    <option value="Umum" {{ $klaster == 'Umum' ? 'selected' : '' }}>Umum</option>
                    <option value="Gigi dan Mulut" {{ $klaster == 'Gigi' ? 'selected' : '' }}>Gigi dan Mulut</option>
                    <option value="Bidan" {{ $klaster == 'Bidan' ? 'selected' : '' }}>Bidan</option>
                </select>
            </div>
        </form>

        {{-- 📋 Tabel --}}
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
