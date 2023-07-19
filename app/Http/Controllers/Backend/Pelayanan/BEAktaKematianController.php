<?php

namespace App\Http\Controllers\Backend\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan\AktaKematian;
use Illuminate\Http\Request;
use PDF;

class BEAktaKematianController extends Controller
{
    public function index()
    {
        $akta_kematian = AktaKematian::all()->reverse();
        return view('backend.menu.pelayanan.akta-kematian.index', compact('akta_kematian'));
    }

    public function print($id)
    {
        $data = AktaKematian::find($id);

        if (!$data) {
            return redirect()->route('admin_akta-kematian.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend\menu\pelayanan\akta-kematian\surat_pengantar_akta_kematian', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_surat pengantar akta kematian.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the AktaKematian record by its ID
        $AktaKematian = AktaKematian::find($id);

        if (!$AktaKematian) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $AktaKematian->status = 1; // Replace 1 with the appropriate status value
        $AktaKematian->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the AktaKematian record by its ID
        $AktaKematian = AktaKematian::find($id);

        if (!$AktaKematian) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $AktaKematian->status = 0; // Replace 1 with the appropriate status value
        $AktaKematian->save();

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
        $data = AktaKematian::findOrFail($id);
        return view('backend.menu.pelayanan.akta-kematian.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = AktaKematian::findOrFail($id);
        $validatedData = $request->validate([
            'no_surat' => 'nullable',
            'nama' => 'required',
            'no_hp' => 'nullable',
            'nik' => 'nullable',
            'tempat_tanggal_lahir' => 'nullable',
            'pekerjaan' => 'nullable',
            'alamat' => 'nullable',
            'agama' => 'nullable',
            'nama_anak' => 'nullable',
            'ttl_anak' => 'nullable',
            'jenis_kelamin_anak' => 'nullable',
            'keterangan_lain' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $data->update($validatedData);

        return redirect()->route('admin_akta-kematian.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perubahan_ktp = AktaKematian::findOrFail($id);
        $perubahan_ktp->delete();

        return redirect()->route('admin_akta-kematian.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
