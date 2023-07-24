<?php

namespace App\Http\Controllers\Backend\Perangkat;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Perangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BEPerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perangkat = Perangkat::latest()->get()->reverse();
        return view('backend.menu.perangkat.index', compact('perangkat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.perangkat.create');
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
            'kontak' => 'nullable',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);

        Perangkat::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kontak' => $request->kontak,
            'photo' => $imageName,
        ]);

        return redirect()->route('admin_perangkat.index')->with('success', 'Perangkat berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $perangkat = Perangkat::findOrFail($id);

        return view('backend.menu.perangkat.edit', compact('perangkat'));
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
            'kontak' => 'nullable',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $perangkat = Perangkat::find($id);

        if (!$perangkat) {
            return redirect()->route('admin_perangkat.index')->with('error', 'Perangkat tidak ditemukan!');
        }

        $perangkat->nama = $request->nama;
        $perangkat->jabatan = $request->jabatan;
        $perangkat->kontak = $request->kontak;

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete the old image file if it exists
            if ($perangkat->photo) {
                Storage::disk('public')->delete('images/' . $perangkat->photo);
            }

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $perangkat->photo = $imageName;
        }

        $perangkat->save();

        return redirect()->route('admin_perangkat.index')->with('success', 'Perangkat berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $perangkat = Perangkat::findOrFail($id);
        // Delete the image file if it exists
        if ($perangkat->photo) {
            Storage::disk('public')->delete('images/' . $perangkat->photo);
        }

        $perangkat->delete();

        return redirect()->route('admin_perangkat.index')->with('success', 'Perangkat berhasil dihapus.');
    }
}
