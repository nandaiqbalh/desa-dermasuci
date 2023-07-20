<?php

namespace App\Http\Controllers\Frontend\Penganduan;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Pengaduan\Kontak;
use App\Models\Frontend\Pengaduan\Pengaduan;
use Illuminate\Http\Request;

class FEPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::latest()->limit(1)->get();
        return view('frontend.pengaduan.pengaduan', compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'nullable',
            'alamat' => 'nullable',
            'subjek_aduan' => 'required',
            'pesan_aduan' => 'required',
        ]);

        Pengaduan::create($validatedData);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('pengaduan.show', compact('pengaduan'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}
