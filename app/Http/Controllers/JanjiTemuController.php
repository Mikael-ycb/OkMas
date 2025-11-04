<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Tanggal;
use App\Models\Klaster;

class JanjiTemuController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        $tanggals = Tanggal::all();
        $klasters = Klaster::all();

        return view('janjiTemu', compact('dokters', 'tanggals', 'klasters'));
    }
}
