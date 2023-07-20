<?php

namespace App\Http\Controllers\Backend\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Pengaduan\Kontak;
use Illuminate\Http\Request;

class BEKontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::all()->reverse();
        return view('backend.menu.kontak_pengaduan.kontak.index', compact('kontaks'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.kontak_pengaduan.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'telpon' => 'required',
            'email' => 'required',
        ]);

        $berita = new Kontak([
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'email' => $request->email,
        ]);

        $berita->save();

        return redirect()->route('admin_kontak.index')->with('success', 'Kontak berhasil dibuat!');
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
        $data = Kontak::findOrFail($id);
        return view('backend.menu.pelayanan.akta-kelahiran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kontak::findOrFail($id);
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
        $perubahan_ktp = Kontak::findOrFail($id);
        $perubahan_ktp->delete();

        return redirect()->route('admin_akta-kelahiran.index')->with('success', 'Kontak berhasil dihapus!');
    }
}
