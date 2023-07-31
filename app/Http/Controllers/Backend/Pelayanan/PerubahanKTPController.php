<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\PerubahanKTP;
use Illuminate\Http\Request;
use PDF;

class PerubahanKTPController extends Controller
{
    public function index()
    {
        $perubahan_ktp = PerubahanKTP::all()->reverse();
        return view('backend.menu.pelayanan.perubahan_ktp.index', compact('perubahan_ktp'));
    }

    public function print($id)
    {
        $data = PerubahanKTP::find($id);

        if (!$data) {
            return redirect()->route('admin_perubahan-ktp.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.perubahan_ktp.surat_pengantar_perubahan_ktp', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_pengantar-ktp.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the PerubahanKTP record by its ID
        $perubahanKTP = PerubahanKTP::find($id);

        if (!$perubahanKTP) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $perubahanKTP->status = 1; // Replace 1 with the appropriate status value
        $perubahanKTP->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the PerubahanKTP record by its ID
        $perubahanKTP = PerubahanKTP::find($id);

        if (!$perubahanKTP) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $perubahanKTP->status = 0; // Replace 1 with the appropriate status value
        $perubahanKTP->save();

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
        $data = PerubahanKTP::findOrFail($id);
        return view('backend.menu.pelayanan.perubahan_ktp.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PerubahanKTP::findOrFail($id);
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

        return redirect()->route('admin_perubahan-ktp.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perubahan_ktp = PerubahanKTP::findOrFail($id);
        $perubahan_ktp->delete();

        return redirect()->route('admin_perubahan-ktp.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
