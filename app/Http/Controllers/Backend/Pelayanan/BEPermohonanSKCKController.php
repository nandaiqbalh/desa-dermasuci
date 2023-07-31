<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\PermohonanSKCK;
use Illuminate\Http\Request;
use PDF;

class BEPermohonanSKCKController extends Controller
{
    public function index()
    {
        $permohonan_skck = PermohonanSKCK::all()->reverse();
        return view('backend.menu.pelayanan.permohonan_skck.index', compact('permohonan_skck'));
    }

    public function print($id)
    {
        $data = PermohonanSKCK::find($id);

        if (!$data) {
            return redirect()->route('admin_permohonan-skck.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.permohonan_skck.surat_pengantar_permohonan_skck', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_pengantar_permohonan_skck.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the permohonanSKCK record by its ID
        $permohonanSKCK = PermohonanSKCK::find($id);

        if (!$permohonanSKCK) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $permohonanSKCK->status = 1; // Replace 1 with the appropriate status value
        $permohonanSKCK->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the permohonanSKCK record by its ID
        $permohonanSKCK = PermohonanSKCK::find($id);

        if (!$permohonanSKCK) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $permohonanSKCK->status = 0; // Replace 1 with the appropriate status value
        $permohonanSKCK->save();

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
        $data = PermohonanSKCK::findOrFail($id);
        return view('backend.menu.pelayanan.permohonan_skck.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PermohonanSKCK::findOrFail($id);
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

        return redirect()->route('admin_permohonan-skck.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perubahan_ktp = PermohonanSKCK::findOrFail($id);
        $perubahan_ktp->delete();

        return redirect()->route('admin_permohonan-skck.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
