<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class AkunPasienController extends Controller
{
    public function index()
    {
        $akun = Akun::where('role', 'pasien')->paginate(10);
        return view('akunPasienAdmin.akunPasienAdmin_index', compact('akun'));
    }

    public function create()
    {
        return view('akunPasienAdmin.akunPasienAdmin_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:akun',
            'username' => 'required|unique:akun',
            'password' => 'required|min:6',
        ]);

        Akun::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'status' => $request->status,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role' => 'pasien',
        ]);

        return redirect()->route('akunPasienAdmin.index')->with('success', 'Akun pasien berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Akun::findOrFail($id)->delete();
        return redirect()->route('akunPasienAdmin.index')->with('success', 'Akun pasien berhasil dihapus.');
    }

    public function edit($id)
{
    $akun = Akun::findOrFail($id);
    return view('akunPasienAdmin.akunPasienAdmin_edit', compact('akun'));
}

public function update(Request $request, $id)
{
    $akun = Akun::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:akun,nik,' . $akun->id,
        'username' => 'required|unique:akun,username,' . $akun->id,
    ]);

    $akun->update([
        'nama' => $request->nama,
        'nik' => $request->nik,
        'username' => $request->username,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'pekerjaan' => $request->pekerjaan,
        'status' => $request->status,
        'no_telepon' => $request->no_telepon,
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('akunPasienAdmin.index')->with('success', 'Akun berhasil diperbarui.');
}

}
