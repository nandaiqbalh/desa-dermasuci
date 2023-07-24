<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);


        $imageName = time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'), $imageName);

        $user = auth()->user(); // Mengambil pengguna yang sedang login

        $galeri = [];

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $photo) {
                $path = $photo->store('gallery', 'public');
                $galeri[] = $path;
            }
        }

        $berita = new Berita([
            'judul_berita' => $request->judul_berita,
            'subjudul_berita' => $request->subjudul_berita,
            'isi_berita' => $request->isi_berita,
            'thumbnail' => $imageName,
            'galeri' => json_encode($galeri),

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
            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $berita = Berita::findOrFail($id);

        $galeri = [];

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $photo) {
                $path = $photo->store('gallery', 'public');
                $galeri[] = $path;
            }
        }

        $berita->judul_berita = $request->judul_berita;
        $berita->subjudul_berita = $request->subjudul_berita;
        $berita->isi_berita = $request->isi_berita;
        $berita->galeri = json_encode($galeri);

        if ($request->hasFile('thumbnail')) {
            $request->validate([
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete the old thumbnail if it exists
            if ($berita->thumbnail) {
                Storage::disk('public')->delete('images/' . $berita->thumbnail);
            }

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

        // Delete the thumbnail if it exists
        if ($berita->thumbnail) {
            Storage::disk('public')->delete('images/' . $berita->thumbnail);
        }

        $galeri = json_decode($berita->galeri);
        if (!empty($galeri)) {
            foreach ($galeri as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }
        $berita->delete();

        return redirect()->route('admin_berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
