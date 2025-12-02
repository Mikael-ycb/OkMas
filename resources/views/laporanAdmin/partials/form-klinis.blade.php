<div class="grid grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow border mt-6">

    <div>
        <label class="block font-semibold mb-1">Anamnesis</label>
        <textarea name="anamnesis" class="w-full border rounded p-2">{{ old('anamnesis', $laporan->anamnesis ?? '') }}</textarea>

        <label class="block font-semibold mt-3 mb-1">Tekanan Darah</label>
        <input type="text" name="tekanan_darah"
               value="{{ old('tekanan_darah', $laporan->tekanan_darah ?? '') }}" class="w-full border rounded p-2">

        <label class="block font-semibold mt-3 mb-1">Riwayat Penyakit Sekarang</label>
        <textarea name="riwayat_penyakit_sekarang" class="w-full border rounded p-2">{{ old('riwayat_penyakit_sekarang', $laporan->riwayat_penyakit_sekarang ?? '') }}</textarea>
    </div>

    <div>
        <label class="block font-semibold mb-1">Riwayat Penyakit Dahulu</label>
        <textarea name="riwayat_penyakit_dahulu" class="w-full border rounded p-2">{{ old('riwayat_penyakit_dahulu', $laporan->riwayat_penyakit_dahulu ?? '') }}</textarea>

        <label class="block font-semibold mt-3 mb-1">Riwayat Penyakit Keluarga</label>
        <textarea name="riwayat_penyakit_keluarga" class="w-full border rounded p-2">{{ old('riwayat_penyakit_keluarga', $laporan->riwayat_penyakit_keluarga ?? '') }}</textarea>

        <label class="block font-semibold mt-3 mb-1">Riwayat Kebiasaan</label>
        <textarea name="riwayat_kebiasaan" class="w-full border rounded p-2">{{ old('riwayat_kebiasaan', $laporan->riwayat_kebiasaan ?? '') }}</textarea>

        <label class="block font-semibold mt-3 mb-1">Anamnesis Organ</label>
        <textarea name="anamnesis_organ" class="w-full border rounded p-2">{{ old('anamnesis_organ', $laporan->anamnesis_organ ?? '') }}</textarea>

        <label class="block font-semibold mt-3 mb-1">Diagnosa</label>
        <textarea name="diagnosa" class="w-full border rounded p-2">{{ old('diagnosa', $laporan->diagnosa ?? '') }}</textarea>

        <label class="block font-semibold mt-3 mb-1">Saran</label>
        <textarea name="saran" class="w-full border rounded p-2">{{ old('saran', $laporan->saran ?? '') }}</textarea>
    </div>
</div>
