<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all()->reverse();
        return view('backend.menu.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required',
            'subjudul_berita' => 'required',
            'isi_berita' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'), $imageName);

        $user = auth()->user(); // Mengambil pengguna yang sedang login

        $berita = new Berita([
            'judul_berita' => $request->judul_berita,
            'subjudul_berita' => $request->subjudul_berita,
            'isi_berita' => $request->isi_berita,
            'thumbnail' => $imageName,
        ]);

        $berita->penulis = $user->name; // Mengisi kolom "penulis" dengan nama pengguna yang sedang login
        $berita->save();

        return redirect()->route('admin_berita.index')->with('success', 'Berita berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('backend.menu.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('backend.menu.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_berita' => 'required',
            'subjudul_berita' => 'required',
            'isi_berita' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = Berita::findOrFail($id);

        $berita->judul_berita = $request->judul_berita;
        $berita->subjudul_berita = $request->subjudul_berita;
        $berita->isi_berita = $request->isi_berita;

        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $imageName);
            $berita->thumbnail = $imageName;
        }

        $berita->save();

        return redirect()->route('admin_berita.index')->with('success', 'Berita berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin_berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
