<?php

namespace App\Http\Controllers;

use App\Models\Klaster;
use Illuminate\Http\Request;

class KlasterController extends Controller
{
    public function index()
    {
        $klasters = Klaster::with('dokters')->get();
        return view('klaster.index', ['klasters' => $klasters]);
    }

    public function create()
    {
        return view('klaster.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|unique:klasters',
            'deskripsi' => 'required|string',
        ]);

        Klaster::create($request->all());
        return redirect()->route('klaster.index')->with('success', 'Klaster berhasil ditambahkan');
    }

    public function edit($id)
    {
        $klaster = Klaster::findOrFail($id);
        return view('klaster.edit', ['klaster' => $klaster]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|string|unique:klasters,jenis,' . $id,
            'deskripsi' => 'required|string',
        ]);

        $klaster = Klaster::findOrFail($id);
        $klaster->update($request->all());
        return redirect()->route('klaster.index')->with('success', 'Klaster berhasil diperbarui');
    }

    public function destroy($id)
    {
        $klaster = Klaster::findOrFail($id);
        $klaster->delete();
        return redirect()->route('klaster.index')->with('success', 'Klaster berhasil dihapus');
    }

    public function detail($jenis)
    {
        $data = [
            'bidan' => [
                'gambar' => asset('img/dokterBidan.jpg'),
                'judul' => 'Klaster Bidan',
                'deskripsi' => 'Klaster Bidan merupakan unit layanan kesehatan yang berfokus pada penyelenggaraan pelayanan kebidanan komprehensif yang mencakup aspek promotif, preventif, kuratif, dan rehabilitatif bagi perempuan pada seluruh siklus reproduksi. Pelayanan ini meliputi pemantauan kehamilan secara berkala, deteksi dini faktor risiko obstetri, penatalaksanaan komplikasi ringan, konseling pra dan pasca persalinan, serta pemberian layanan keluarga berencana berbasis kebutuhan klien. Dalam pelaksanaannya, klaster bidan mengedepankan pendekatan holistik dengan mempertimbangkan aspek fisiologis, psikologis, dan sosial pasien, serta berpedoman pada standar praktik kebidanan nasional. Selain itu, layanan ini bertujuan meningkatkan kualitas kesehatan ibu dan anak melalui intervensi yang berbasis bukti dan berorientasi pada keselamatan pasien.'
            ],
            'umum' => [
                'gambar' => asset('img/dokterUmum.jpg'),
                'judul' => 'Klaster Umum',
                'deskripsi' => 'Klaster Umum berperan sebagai garda utama dalam penyediaan layanan kesehatan dasar yang bersifat multidisipliner, mencakup penilaian kondisi klinis umum, penegakan diagnosis awal, serta pemberian terapi sesuai standar kedokteran. Unit ini menangani beragam keluhan medis non-spesialistik seperti infeksi ringan, gangguan sistem pernapasan, kelainan metabolik ringan, serta masalah kesehatan sehari-hari lainnya. Pendekatan pelayanan dilakukan melalui anamnesis mendalam, pemeriksaan fisik sistematis, dan pemilihan intervensi terapeutik yang tepat guna. Selain fungsi kuratif, klaster umum juga menjalankan upaya promotif dan preventif seperti edukasi kesehatan, manajemen faktor risiko, serta rekomendasi rujukan ke spesialis bila diperlukan. Tujuan utamanya adalah memastikan tercapainya derajat kesehatan optimal melalui pelayanan yang responsif, akurat, dan berbasis bukti ilmiah.'
            ],
            'gigi' => [
                'gambar' => asset('img/doktergigi.jpg'),
                'judul' => 'Klaster Gigi dan Mulut',
                'deskripsi' => 'Klaster Gigi dan Mulut menyediakan pelayanan kesehatan oral yang terintegrasi dan berorientasi pada pemeliharaan, pemulihan, serta peningkatan fungsi sistem stomatognatik. Layanan ini mencakup pemeriksaan kondisi rongga mulut secara menyeluruh, identifikasi kelainan dental dan periodontal, penatalaksanaan karies, tindakan konservatif, pencabutan gigi, hingga prosedur pembersihan kalkulus dan plak secara profesional. Dalam melakukan intervensi, klaster ini menerapkan prinsip kedokteran gigi preventif dan terapeutik dengan mengutamakan presisi, sterilitas, serta kenyamanan pasien. Selain itu, dilakukan pula edukasi mengenai perilaku kesehatan gigi yang benar, modifikasi pola makan, dan strategi jangka panjang untuk meminimalkan risiko penyakit oral. Keseluruhan layanan dirancang untuk menjaga integritas jaringan gigi-mulut, meningkatkan kualitas hidup, dan mencegah komplikasi odontogenik di masa mendatang.'
            ],

        ];

        if (!array_key_exists($jenis, $data)) {
            abort(404);
        }

        return view('detailKlaster', [
            'title' => $data[$jenis]['judul'],
            'data' => $data[$jenis]
        ]);
    }
}
