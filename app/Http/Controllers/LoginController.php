<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Akun;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {
                return redirect()->route('laporanAdmin.index');
            } else {
                return redirect()->route('home');
            }
        }

        return view('login', ['title' => 'Login']);
    }



    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // cari user di model Akun
        $akun = Akun::where('nik', $request->login)
            ->orWhere('username', $request->login)
            ->first();

        // cek user & password
        if ($akun && Hash::check($request->password, $akun->password)) {

            Auth::loginUsingId($akun->id_akun);
            $request->session()->regenerate();

            // ✅ Cek role
            if ($akun->role === 'admin') {
                return redirect()->route('laporanAdmin.index')
                    ->with('success', 'Selamat datang, Admin!');
            } else {
                return redirect()->route('home')
                    ->with('success', 'Selamat datang di OKMAS!');
            }
        }

        return back()->with('error', 'Login salah!')->withInput();
    }



    public function logout(Request $request)
    {
        Auth::logout(); // ✅ logout beneran
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}