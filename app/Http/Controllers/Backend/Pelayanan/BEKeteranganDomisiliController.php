<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\KeteranganDomisili;
use Illuminate\Http\Request;
use PDF;

class BEKeteranganDomisiliController extends Controller
{
    public function index()
    {
        $keterangan_domisili = KeteranganDomisili::all()->reverse();
        return view('backend.menu.pelayanan.keterangan_domisili.index', compact('keterangan_domisili'));
    }

    public function print($id)
    {
        $data = KeteranganDomisili::find($id);

        if (!$data) {
            return redirect()->route('admin_keterangan-domisili.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.keterangan_domisili.surat_keterangan_domisili', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_surat keterangan domisili.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the KeteranganDomisili record by its ID
        $KeteranganDomisili = KeteranganDomisili::find($id);

        if (!$KeteranganDomisili) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $KeteranganDomisili->status = 1; // Replace 1 with the appropriate status value
        $KeteranganDomisili->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the KeteranganDomisili record by its ID
        $KeteranganDomisili = KeteranganDomisili::find($id);

        if (!$KeteranganDomisili) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $KeteranganDomisili->status = 0; // Replace 1 with the appropriate status value
        $KeteranganDomisili->save();

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
        $data = KeteranganDomisili::findOrFail($id);
        return view('backend.menu.pelayanan.keterangan_domisili.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = KeteranganDomisili::findOrFail($id);
        $data->no_surat = $request->input('no_surat');
        $data->nama = $request->input('nama');
        $data->no_hp = $request->input('no_hp');
        $data->nik = $request->input('nik');
        $data->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $data->alamat_ktp = $request->input('alamat_ktp');
        $data->alamat_sekarang = $request->input('alamat_sekarang');
        $data->catatan = $request->input('catatan');
        $data->save();

        return redirect()->route('admin_keterangan-domisili.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $KeteranganDomisili = KeteranganDomisili::findOrFail($id);
        $KeteranganDomisili->delete();

        return redirect()->route('admin_keterangan-domisili.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
