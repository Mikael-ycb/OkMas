<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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
    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:akun,nik',
            'username' => 'required|unique:akun,username',
            'password' => 'required|min:5',
            'nama' => 'required',
        ]);

        Akun::create([
            'nik' => $request->nik,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'role' => 'pasien',
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    // ✅ FORGOT PASSWORD FORM
    public function forgotPasswordForm()
    {
        return view('forgot-password');
    }

    // ✅ SEND RESET TOKEN
    public function sendResetToken(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
        ]);

        // Cari user berdasarkan NIK atau Username
        $akun = Akun::where('nik', $request->login)
            ->orWhere('username', $request->login)
            ->first();

        if (!$akun) {
            return back()->with('error', 'NIK atau Username tidak ditemukan!');
        }

        // Generate token unik
        $token = Str::random(60);
        
        // Simpan token ke database
        DB::table('password_resets')->updateOrInsert(
            ['email' => $akun->username],
            [
                'email' => $akun->username,
                'token' => Hash::make($token),
                'created_at' => now(),
            ]
        );

        // TODO: Kirim email dengan link reset (untuk sekarang hanya show token)
        return redirect()->route('password.reset', ['token' => $token])
            ->with('success', 'Token reset telah dibuat. Silakan reset password Anda.');
    }

    // ✅ RESET PASSWORD FORM
    public function resetPasswordForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    // ✅ RESET PASSWORD
    public function resetPassword(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|min:5|confirmed',
            'token' => 'required',
        ]);

        // Cari user berdasarkan NIK atau Username
        $akun = Akun::where('nik', $request->login)
            ->orWhere('username', $request->login)
            ->first();

        if (!$akun) {
            return back()->with('error', 'NIK atau Username tidak ditemukan!');
        }

        // Verifikasi token
        $passwordReset = DB::table('password_resets')
            ->where('email', $akun->username)
            ->first();

        if (!$passwordReset || !Hash::check($request->token, $passwordReset->token)) {
            return back()->with('error', 'Token tidak valid atau telah kadaluarsa!');
        }

        // Update password
        $akun->update([
            'password' => Hash::make($request->password),
        ]);

        // Hapus token
        DB::table('password_resets')
            ->where('email', $akun->username)
            ->delete();

        return redirect()->route('login.form')
            ->with('success', 'Password berhasil direset! Silakan login dengan password baru.');
    }
}