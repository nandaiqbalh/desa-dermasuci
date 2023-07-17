<?php

namespace App\Http\Controllers;

use App\Models\PembuatanKTP;
use Illuminate\Http\Request;

class PembuatanKTPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pembuatan_ktp.index');
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
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'nullable',
            'nik' => 'nullable',
            'tempat_tanggal_lahir' => 'nullable',
            'pekerjaan' => 'nullable',
            'alamat' => 'nullable',
            'agama' => 'nullable',
            'catatan' => 'nullable',
        ]);

        // Simpan data ke database
        $pembuatanKTP = PembuatanKTP::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('pembuatan-ktp.index')->with('success', 'Form berhasil disubmit.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
