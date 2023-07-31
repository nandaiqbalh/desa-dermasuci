<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\PindahDomisili;
use Illuminate\Http\Request;
use PDF;

class BEPindahDomisiliController extends Controller
{
    public function index()
    {
        $pindah_domisili = PindahDomisili::all()->reverse();
        return view('backend.menu.pelayanan.pindah_domisili.index', compact('pindah_domisili'));
    }

    public function print($id)
    {
        $data = PindahDomisili::find($id);

        if (!$data) {
            return redirect()->route('admin_pindah-domisili.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.pindah_domisili.surat_pindah_domisili', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_surat_pindah_domisili.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the permohonanKK record by its ID
        $permohonanKK = PindahDomisili::find($id);

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
        $permohonanKK = PindahDomisili::find($id);

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
        $data = PindahDomisili::findOrFail($id);
        return view('backend.menu.pelayanan.pindah_domisili.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PindahDomisili::findOrFail($id);
        $data->no_surat = $request->input('no_surat');
        $data->nama = $request->input('nama');
        $data->no_kk = $request->input('no_kk');
        $data->no_hp = $request->input('no_hp');
        $data->nik = $request->input('nik');
        $data->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $data->alamat_asal = $request->input('alamat_asal');
        $data->alamat_tujuan = $request->input('alamat_tujuan');
        $data->keterangan = $request->input('keterangan');
        $data->catatan = $request->input('catatan');
        $data->save();

        return redirect()->route('admin_pindah-domisili.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permohonanKK = PindahDomisili::findOrFail($id);
        $permohonanKK->delete();

        return redirect()->route('admin_pindah-domisili.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
