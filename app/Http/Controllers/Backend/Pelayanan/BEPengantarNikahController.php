<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\PengantarNikah;
use Illuminate\Http\Request;
use PDF;

class BEPengantarNikahController extends Controller
{
    public function index()
    {
        $pengantar_nikah = PengantarNikah::all()->reverse();
        return view('backend.menu.pelayanan.pengantar_nikah.index', compact('pengantar_nikah'));
    }

    public function print($id)
    {
        $data = PengantarNikah::find($id);

        if (!$data) {
            return redirect()->route('admin_pengantar-nikah.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.pengantar_nikah.surat_pengantar_nikah', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_surat pengantar nikah.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the PengantarNikah record by its ID
        $pengantarNikah = PengantarNikah::find($id);

        if (!$pengantarNikah) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $pengantarNikah->status = 1; // Replace 1 with the appropriate status value
        $pengantarNikah->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the PengantarNikah record by its ID
        $pengantarNikah = PengantarNikah::find($id);

        if (!$pengantarNikah) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $pengantarNikah->status = 0; // Replace 1 with the appropriate status value
        $pengantarNikah->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan sedang dalam review.');
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
        $data = PengantarNikah::findOrFail($id);
        return view('backend.menu.pelayanan.pengantar_nikah.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PengantarNikah::findOrFail($id);
        $validatedData = $request->validate([
            'no_surat' => 'nullable',
            'nama' => 'required',
            'no_hp' => 'nullable',
            'nik' => 'nullable',
            'tempat_tanggal_lahir' => 'nullable',
            'pekerjaan' => 'nullable',
            'alamat' => 'nullable',
            'agama' => 'nullable',
            'status_perkawinan' => 'nullable',
            'nama_ayah' => 'nullable',
            'nik_ayah' => 'nullable',
            'tempat_tanggal_lahir_ayah' => 'nullable',
            'pekerjaan_ayah' => 'nullable',
            'alamat_ayah' => 'nullable',
            'agama_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
            'nik_ibu' => 'nullable',
            'tempat_tanggal_lahir_ibu' => 'nullable',
            'pekerjaan_ibu' => 'nullable',
            'alamat_ibu' => 'nullable',
            'agama_ibu' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $data->update($validatedData);

        return redirect()->route('admin_pengantar-nikah.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perubahan_ktp = PengantarNikah::findOrFail($id);
        $perubahan_ktp->delete();

        return redirect()->route('admin_pengantar-nikah.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
