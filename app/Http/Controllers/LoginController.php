<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // 🔹 Tampilkan halaman login
    public function showLoginForm()
    {
        // Kalau sudah login, langsung ke home
        if (session('akun_id')) {
            return redirect('/');
        }

        return view('login', ['title' => 'Login']);
    }

    // 🔹 Proses login (bisa pakai NIK atau Username)
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required', // bisa NIK atau Username
            'password' => 'required',
        ]);

        // Cek akun berdasarkan NIK atau username
        $akun = DB::table('akun')
            ->where('nik', $request->login)
            ->orWhere('username', $request->login)
            ->first();

        if ($akun && Hash::check($request->password, $akun->password)) {
            // Simpan sesi login
            $request->session()->put([
                'akun_id' => $akun->id,
                'akun_nik' => $akun->nik,
                'akun_username' => $akun->username,
            ]);

            return redirect('/')->with('success', 'Berhasil login!');
        }

        return back()->with('error', 'NIK/Username atau password salah!')->withInput();
    }

    // 🔹 Logout user
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }

    
}
