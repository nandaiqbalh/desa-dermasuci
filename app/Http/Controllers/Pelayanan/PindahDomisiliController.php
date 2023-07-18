<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\PindahDomisili;
use Illuminate\Http\Request;

class PindahDomisiliController extends Controller
{
    public function index()
    {
        return view('frontend.pelayanan.pindah_domisili.pindah_domisili');
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
            'no_kk' => 'nullable',
            'no_hp' => 'nullable',
            'nik' => 'nullable',
            'keterangan' => 'nullable',
            'tempat_tanggal_lahir' => 'nullable',
            'alamat_asal' => 'nullable',
            'alamat_tujuan' => 'nullable',
            'catatan' => 'nullable',
        ]);

        // Simpan data ke database
        $permohonanKK = PindahDomisili::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->route('pindah-domisili.index')->with('success', 'Form berhasil disubmit.');
    }
}
