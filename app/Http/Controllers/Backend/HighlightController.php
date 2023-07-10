<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Highlight;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $highlights = Highlight::all();
        return view('backend.menu.highlight.index', compact('highlights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.highlight.create');
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

        Highlight::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image_file' => $imageName,
        ]);

        return redirect()->route('highlights.index')->with('success', 'Highlight created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function show(Highlight $highlight)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function edit(Highlight $highlight)
    {
        return view('backend.menu.highlight.edit', compact('highlight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Highlight $highlight)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        $highlight->title = $request->title;
        $highlight->subtitle = $request->subtitle;

        if ($request->hasFile('image_file')) {
            $request->validate([
                'image_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time() . '.' . $request->image_file->extension();
            $request->image_file->move(public_path('images'), $imageName);
            $highlight->image_file = $imageName;
        }

        $highlight->save();

        return redirect()->route('highlights.index')->with('success', 'Highlight updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Highlight  $highlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Highlight $highlight)
    {
        $highlight->delete();

        return redirect()->route('highlights.index')->with('success', 'Highlight deleted successfully.');
    }
}
