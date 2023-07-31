<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PembuatanKTP;
use Illuminate\Http\Request;
use PDF;


class BPembuatanKTPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembuatan_ktp = PembuatanKTP::all()->reverse();
        return view('backend.menu.pelayanan.pembuatan_ktp.index', compact('pembuatan_ktp'));
    }

    public function print($id)
    {
        $data = PembuatanKTP::find($id);

        if (!$data) {
            return redirect()->route('admin_pembuatan-ktp.index')->with('error', 'Data not found');
        }

        $pdf = PDF::loadView('backend.menu.pelayanan.pembuatan_ktp.surat_pengantar_pembuatan_ktp', compact('data'));

        $filename = $data->nama . '_' . $data->nik . '_pengantar-ktp.pdf';

        return $pdf->stream($filename);
    }

    public function dalamReviewAction($id)
    {
        // Find the PembuatanKTP record by its ID
        $pembuatanKTP = PembuatanKTP::find($id);

        if (!$pembuatanKTP) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $pembuatanKTP->status = 1; // Replace 1 with the appropriate status value
        $pembuatanKTP->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the PembuatanKTP record by its ID
        $pembuatanKTP = PembuatanKTP::find($id);

        if (!$pembuatanKTP) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $pembuatanKTP->status = 0; // Replace 2 with the appropriate status value
        $pembuatanKTP->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan sedang dalam review.');
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
        //
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
        $data = PembuatanKTP::findOrFail($id);
        return view('backend.menu.pelayanan.pembuatan_ktp.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PembuatanKTP::findOrFail($id);
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

        return redirect()->route('admin_pembuatan-ktp.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembuatan_ktp = PembuatanKTP::findOrFail($id);
        $pembuatan_ktp->delete();

        return redirect()->route('admin_pembuatan-ktp.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
