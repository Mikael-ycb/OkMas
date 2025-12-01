<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $akun = Auth::user();
        if (! $akun) {
            return redirect()->route('login');
        }
        return view('profile', [
            'akun' => $akun
        ]);
    }
}
