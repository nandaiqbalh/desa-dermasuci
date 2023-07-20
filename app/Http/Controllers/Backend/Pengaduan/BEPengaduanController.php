<?php

namespace App\Http\Controllers\Backend\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Pengaduan\Pengaduan;
use Illuminate\Http\Request;

class BEPengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all()->reverse();
        return view('backend.menu.kontak_pengaduan.pengaduan.index', compact('pengaduan'));
    }

    public function dalamReviewAction($id)
    {
        // Find the Pengaduan record by its ID
        $Pengaduan = Pengaduan::find($id);

        if (!$Pengaduan) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's in review
        $Pengaduan->status = 1; // Replace 1 with the appropriate status value
        $Pengaduan->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan ditandai sudah selesai.');
    }

    public function selesaiAction($id)
    {
        // Find the Pengaduan record by its ID
        $Pengaduan = Pengaduan::find($id);

        if (!$Pengaduan) {
            // Handle the case when the record is not found
            return redirect()->back()->with('error', 'Pengajuan not found.');
        }

        // Update the status to indicate it's completed
        $Pengaduan->status = 0; // Replace 1 with the appropriate status value
        $Pengaduan->save();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('success', 'Pengajuan sedang dalam review.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('backend.menu.pengaduan.show', compact('pengaduan'));
    }

    public function destroy(string $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('admin_pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
