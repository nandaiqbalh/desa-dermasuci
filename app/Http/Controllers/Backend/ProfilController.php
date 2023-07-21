<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::latest()->limit(1)->get();
        return view('backend.menu.profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.profil.create');
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
            'title' => 'required',
            'subtitle' => 'required',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image_file->extension();
        $request->image_file->move(public_path('images'), $imageName);

        Profil::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_file' => $imageName,
        ]);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        return view('backend.menu.profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profil->title = $request->title;
        $profil->subtitle = $request->subtitle;

        if ($request->hasFile('image_file')) {
            $request->validate([
                'image_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete the old image file if it exists
            if ($profil->image_file) {
                Storage::disk('public')->delete('images/' . $profil->image_file);
            }

            $imageName = time() . '.' . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $profil->image_file = $imageName;
        }

        $profil->save();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        // Delete the image file if it exists
        if ($profil->image_file) {
            Storage::disk('public')->delete('images/' . $profil->image_file);
        }

        $profil->delete();

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus.');
    }
}
