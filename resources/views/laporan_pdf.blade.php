<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pemeriksaan</title>

    <style>
        body { font-family: sans-serif; font-size: 13px; }
        h2 { margin-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        td, th { padding: 6px; border: 1px solid #ccc; }
    </style>
</head>
<body>

    <h2 style="text-align:center;">LAPORAN PEMERIKSAAN PASIEN</h2>
    <hr>

    <table>
        <tr>
            <th>Nama Pasien</th>
            <td>{{ $laporan->nama_pasien }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $laporan->nik }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</td>
        </tr>
        <tr>
            <th>Jenis Pemeriksaan</th>
            <td>{{ $laporan->jenis_pemeriksaan }}</td>
        </tr>
    </table>

    <h3>Hasil Pemeriksaan</h3>
    <p>{{ $laporan->hasil_pemeriksaan }}</p>

    <h3>Anamnesis</h3>
    <p>{{ $laporan->anamnesis }}</p>

    <h3>Tekanan Darah</h3>
    <p>{{ $laporan->tekanan_darah }}</p>

    <h3>Diagnosa</h3>
    <p>{{ $laporan->riwayat_penyakit_sekarang }}</p>

    <h3>Saran</h3>
    <p>{{ $laporan->riwayat_kebiasaan }}</p>

    <br><br>

    <p style="text-align:right;">Puskesmas Candiroto</p>

</body>
</html>
