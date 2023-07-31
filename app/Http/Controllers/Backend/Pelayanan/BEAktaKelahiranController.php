<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\AktaKelahiran;
use Illuminate\Http\Request;
use PDF;

class BEAktaKelahiranController extends Controller
{
    public function index()
    {
        $akta_kelahiran = AktaKelahiran::all()->reverse();
        return view('backend.menu.pelayanan.akta-kelahiran.index', compact('akta_kelahiran'));
    }

    public function print($id)
    {
        $data = AktaKelahiran::find($id);

        if (!$data) {
            return redirect()->route('admin_akta-kelahiran.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.akta-kelahiran.surat_pengantar_akta_kelahiran', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_surat pengantar akta kelahiran.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the AktaKelahiran record by its ID
        $AktaKelahiran = AktaKelahiran::find($id);

        if (!$AktaKelahiran) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $AktaKelahiran->status = 1; // Replace 1 with the appropriate status value
        $AktaKelahiran->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the AktaKelahiran record by its ID
        $AktaKelahiran = AktaKelahiran::find($id);

        if (!$AktaKelahiran) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $AktaKelahiran->status = 0; // Replace 1 with the appropriate status value
        $AktaKelahiran->save();

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
        $data = AktaKelahiran::findOrFail($id);
        return view('backend.menu.pelayanan.akta-kelahiran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = AktaKelahiran::findOrFail($id);
        $data->no_surat = $request->input('no_surat');
        $data->nama = $request->input('nama');
        $data->no_hp = $request->input('no_hp');
        $data->nik = $request->input('nik');
        $data->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $data->pekerjaan = $request->input('pekerjaan');
        $data->alamat = $request->input('alamat');
        $data->agama = $request->input('agama');
        $data->nama_anak = $request->input('nama_anak');
        $data->ttl_anak = $request->input('ttl_anak');
        $data->jenis_kelamin_anak = $request->input('jenis_kelamin_anak');
        $data->keterangan_lain = $request->input('keterangan_lain');
        $data->catatan = $request->input('catatan');
        $data->save();

        return redirect()->route('admin_akta-kelahiran.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perubahan_ktp = AktaKelahiran::findOrFail($id);
        $perubahan_ktp->delete();

        return redirect()->route('admin_akta-kelahiran.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
