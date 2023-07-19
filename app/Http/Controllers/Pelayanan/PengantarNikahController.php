<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\PengantarNikah;
use Illuminate\Http\Request;

class PengantarNikahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pelayanan.pengantar_nikah.pengantar_nikah');
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
            'status_perkawinan' => 'nullable',
            'agama' => 'nullable',

            'nama_ayah' => 'required',
            'nik_ayah' => 'nullable',
            'tempat_tanggal_lahir_ayah' => 'nullable',
            'pekerjaan_ayah' => 'nullable',
            'alamat_ayah' => 'nullable',
            'agama_ayah' => 'nullable',

            'nama_ibu' => 'required',
            'nik_ibu' => 'nullable',
            'tempat_tanggal_lahir_ibu' => 'nullable',
            'pekerjaan_ibu' => 'nullable',
            'alamat_ibu' => 'nullable',
            'agama_ibu' => 'nullable',

            'catatan' => 'nullable',
        ]);

        // Simpan data ke database
        $pengantarNikah = PengantarNikah::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('pengantar-nikah.index')->with('success', 'Form berhasil disubmit.');
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
