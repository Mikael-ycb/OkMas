<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiPasien;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notif = NotifikasiPasien::latest()->get();

        return view('notifikasi', compact('notif'));
    }
    public function destroy($id)
    {
        $notif = NotifikasiPasien::findOrFail($id);
        $notif->delete();

        return redirect()->route('notifikasi.index')->with('success', 'Notifikasi telah dihapus.');
    }
}
