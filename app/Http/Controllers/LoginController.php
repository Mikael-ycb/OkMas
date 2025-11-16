<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // 🔹 Halaman form login
    public function showLoginForm()
    {
        if (session('akun_id')) {
            // Kalau sudah login arahkan sesuai role
            if (session('akun_role') === 'admin') {
                return redirect()->route('laporanAdmin.index');
            } else {
                return redirect()->route('home');
            }
        }

        return view('login', ['title' => 'Login']);
    }

    // 🔹 Proses login (bisa NIK atau Username)
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required', // bisa NIK / Username
            'password' => 'required',
        ]);

        // Cek data di tabel akun
        $akun = DB::table('akun')
            ->where('nik', $request->login)
            ->orWhere('username', $request->login)
            ->first();

        // Jika akun ditemukan dan password cocok
        if ($akun && Hash::check($request->password, $akun->password)) {
            // Simpan session
            $request->session()->put([
                'akun_id' => $akun->id,
                'akun_nik' => $akun->nik,
                'akun_username' => $akun->username,
                'akun_role' => $akun->role,
            ]);

            // Arahkan sesuai role
            if ($akun->role === 'admin') {
                return redirect()->route('laporanAdmin.index')->with('success', 'Selamat datang, Admin!');
            } else {
                return redirect()->route('home')->with('success', 'Selamat datang di OKMAS!');
            }
        }

        return back()->with('error', 'NIK/Username atau Password salah!')->withInput();
    }

    // 🔹 Logout user
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
