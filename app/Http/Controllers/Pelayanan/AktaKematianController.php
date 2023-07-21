<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\AktaKematian;
use Illuminate\Http\Request;

class AktaKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pelayanan.akta_kematian.akta_kematian');
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
        // Validate the input data
        $validatedData = $request->validate([
            'no_surat' => 'nullable|string',
            'nama' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'nik' => 'nullable|string',
            'tempat_tanggal_lahir' => 'nullable|string',
            'alamat' => 'nullable|string',
            'nama_termohon' => 'nullable|string',
            'bin_termohon' => 'nullable|string',
            'nik_termohon' => 'nullable|string',
            'ttl_termohon' => 'nullable|string',
            'jenis_kelamin_termohon' => 'nullable|string',
            'agama_termohon' => 'nullable|string',
            'tanggal_meninggal' => 'nullable|string',
            'jam_meninggal' => 'nullable|string',
            'tempat_meninggal' => 'nullable|string',
            'status' => 'integer',
            'catatan' => 'nullable|string',
        ]);

        // Create a new instance of the AktaKematian model with the validated data
        $aktaKematian = AktaKematian::create($validatedData);

        // Optionally, you can redirect to a specific route or perform any other actions here.

        return redirect()->route('akta-kematian.index')->with('success', 'Form berhasil disubmit.');
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
