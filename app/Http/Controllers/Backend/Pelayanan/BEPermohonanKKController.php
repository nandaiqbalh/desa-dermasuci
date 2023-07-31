<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\PermohonanKK;
use Illuminate\Http\Request;
use PDF;

class BEPermohonanKKController extends Controller
{
    public function index()
    {
        $permohonan_kk = PermohonanKK::all()->reverse();
        return view('backend.menu.pelayanan.permohonan_kk.index', compact('permohonan_kk'));
    }

    public function print($id)
    {
        $data = PermohonanKK::find($id);

        if (!$data) {
            return redirect()->route('admin_permohonan-kk.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.permohonan_kk.surat_pengantar_permohonan_kk', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_permohonan-kk.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the permohonanKK record by its ID
        $permohonanKK = PermohonanKK::find($id);

        if (!$permohonanKK) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $permohonanKK->status = 1; // Replace 1 with the appropriate status value
        $permohonanKK->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the permohonanKK record by its ID
        $permohonanKK = PermohonanKK::find($id);

        if (!$permohonanKK) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $permohonanKK->status = 0; // Replace 1 with the appropriate status value
        $permohonanKK->save();

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
        $data = PermohonanKK::findOrFail($id);
        return view('backend.menu.pelayanan.permohonan_kk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PermohonanKK::findOrFail($id);
        $data->no_surat = $request->input('no_surat');
        $data->nama = $request->input('nama');
        $data->no_hp = $request->input('no_hp');
        $data->nik = $request->input('nik');
        $data->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $data->pekerjaan = $request->input('pekerjaan');
        $data->alamat = $request->input('alamat');
        $data->agama = $request->input('agama');
        $data->catatan = $request->input('catatan');
        $data->save();

        return redirect()->route('admin_permohonan-kk.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permohonanKK = PermohonanKK::findOrFail($id);
        $permohonanKK->delete();

        return redirect()->route('admin_permohonan-kk.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
