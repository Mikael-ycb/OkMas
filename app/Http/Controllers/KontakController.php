<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kontak', ['title' => 'Kontak']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        Kontak::create([
            'nama'   => Auth::user()->nama,
            'email'  => $request->email,
            'subjek' => $request->subjek,
            'pesan'  => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        //
    }
}
