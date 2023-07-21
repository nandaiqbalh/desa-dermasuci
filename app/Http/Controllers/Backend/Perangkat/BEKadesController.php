<?php

namespace App\Http\Controllers\Backend\Perangkat;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Kades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BEKadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kades = Kades::latest()->limit(1)->get();
        return view('backend.menu.perangkat.kades.index', compact('kades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.perangkat.kades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);

        Kades::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'photo' => $imageName,
        ]);

        return redirect()->route('admin_kades.index')->with('success', 'Kades berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $kades = Kades::findOrFail($id);

        return view('backend.menu.perangkat.kades.edit', compact('kades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kades = Kades::find($id);

        if (!$kades) {
            return redirect()->route('admin_kades.index')->with('error', 'Kades tidak ditemukan!');
        }

        $kades->nama = $request->nama;
        $kades->jabatan = $request->jabatan;

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete the old image file if it exists
            if ($kades->photo) {
                Storage::disk('public')->delete('images/' . $kades->photo);
            }

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $kades->photo = $imageName;
        }

        $kades->save();

        return redirect()->route('admin_kades.index')->with('success', 'Kades berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $kades = Kades::findOrFail($id);
        // Delete the image file if it exists
        if ($kades->photo) {
            Storage::disk('public')->delete('images/' . $kades->photo);
        }

        $kades->delete();

        return redirect()->route('admin_kades.index')->with('success', 'Kades berhasil dihapus.');
    }
}
