<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\AktaKelahiran;
use Illuminate\Http\Request;

class AktaKelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pelayanan.akta_kelahiran.akta_kelahiran');
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
            'nama_anak' => 'nullable',
            'ttl_anak' => 'nullable',
            'jenis_kelamin_anak' => 'nullable',
            'keterangan_lain' => 'nullable',
            'catatan' => 'nullable',
        ]);

        // Simpan data ke database
        $pembuatanKTP = AktaKelahiran::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('perubahan-ktp.index')->with('success', 'Form berhasil disubmit.');
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
