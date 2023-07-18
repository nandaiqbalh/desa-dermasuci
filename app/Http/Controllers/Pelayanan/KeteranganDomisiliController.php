<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\KeteranganDomisili;
use Illuminate\Http\Request;

class KeteranganDomisiliController extends Controller
{
    public function index()
    {
        return view('frontend.pelayanan.keterangan_domisili.keterangan_domisili');
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
            'alamat_ktp' => 'nullable',
            'alamat_sekarang' => 'nullable',
            'catatan' => 'nullable',
        ]);

        // Simpan data ke database
        $permohonanKK = KeteranganDomisili::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('keterangan-domisili.index')->with('success', 'Form berhasil disubmit.');
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
