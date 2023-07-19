<?php

namespace App\Http\Controllers\Backend\Potensi;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BEPotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potensi = Potensi::latest()->get();
        return view('backend.menu.potensi.index', compact('potensi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.potensi.create');
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

        Potensi::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_file' => $imageName,
        ]);

        return redirect()->route('admin_potensi.index')->with('success', 'Potensi berhasil dibuat!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $potensi = Potensi::findOrFail($id);

        return view('backend.menu.potensi.edit', compact('potensi'));
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
            'title' => 'required',
            'subtitle' => 'required',
            'image_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $potensi = Potensi::find($id);

        if (!$potensi) {
            return redirect()->route('admin_potensi.index')->with('error', 'Potensi tidak ditemukan!');
        }

        $potensi->title = $request->title;
        $potensi->subtitle = $request->subtitle;

        if ($request->hasFile('image_file')) {
            $request->validate([
                'image_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete the old image file if it exists
            if ($potensi->image_file) {
                Storage::disk('public')->delete('images/' . $potensi->image_file);
            }

            $imageName = time() . '.' . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $potensi->image_file = $imageName;
        }

        $potensi->save();

        return redirect()->route('admin_potensi.index')->with('success', 'Potensi berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $potensi = Potensi::findOrFail($id);
        // Delete the image file if it exists
        if ($potensi->image_file) {
            Storage::disk('public')->delete('images/' . $potensi->image_file);
        }

        $potensi->delete();

        return redirect()->route('admin_potensi.index')->with('success', 'Potensi berhasil dihapus.');
    }
}
