<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id_akun ?? null;
        
        // Get notifications: either for specific user or for all users (null)
        $notif = NotifikasiPasien::where('pasien_id', $userId)
            ->orWhereNull('pasien_id')
            ->latest()
            ->get();

        return view('notifikasi', compact('notif'));
    }
    
    public function destroy($id)
    {
        $notif = NotifikasiPasien::findOrFail($id);
        $notif->delete();

        return redirect()->route('notifikasi.index')->with('success', 'Notifikasi telah dihapus.');
    }
}
