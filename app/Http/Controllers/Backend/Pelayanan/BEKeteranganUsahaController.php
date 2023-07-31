<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\KeteranganUsaha;
use Illuminate\Http\Request;
use PDF;

class BEKeteranganUsahaController extends Controller
{
    public function index()
    {
        $keterangan_usaha = KeteranganUsaha::all()->reverse();
        return view('backend.menu.pelayanan.keterangan_usaha.index', compact('keterangan_usaha'));
    }

    public function print($id)
    {
        $data = KeteranganUsaha::find($id);

        if (!$data) {
            return redirect()->route('admin_keterangan-usaha.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.keterangan_usaha.surat_keterangan_usaha', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_surat keterangan usaha.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the KeteranganUsaha record by its ID
        $KeteranganUsaha = KeteranganUsaha::find($id);

        if (!$KeteranganUsaha) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $KeteranganUsaha->status = 1; // Replace 1 with the appropriate status value
        $KeteranganUsaha->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the KeteranganUsaha record by its ID
        $KeteranganUsaha = KeteranganUsaha::find($id);

        if (!$KeteranganUsaha) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $KeteranganUsaha->status = 0; // Replace 1 with the appropriate status value
        $KeteranganUsaha->save();

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
        $data = KeteranganUsaha::findOrFail($id);
        return view('backend.menu.pelayanan.keterangan_usaha.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = KeteranganUsaha::findOrFail($id);
        $data->no_surat = $request->input('no_surat');
        $data->nama = $request->input('nama');
        $data->no_hp = $request->input('no_hp');
        $data->nik = $request->input('nik');
        $data->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $data->pekerjaan = $request->input('pekerjaan');
        $data->alamat = $request->input('alamat');
        $data->agama = $request->input('agama');
        $data->nama_usaha = $request->input('nama_usaha');
        $data->tanggal_usaha = $request->input('tanggal_usaha');
        $data->alamat_usaha = $request->input('alamat_usaha');
        $data->jenis_usaha = $request->input('jenis_usaha');
        $data->catatan = $request->input('catatan');
        $data->save();

        return redirect()->route('admin_keterangan-usaha.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perubahan_ktp = KeteranganUsaha::findOrFail($id);
        $perubahan_ktp->delete();

        return redirect()->route('admin_keterangan-usaha.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
