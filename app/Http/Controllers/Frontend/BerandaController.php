<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Kades;
use App\Models\Frontend\Perangkat;
use App\Models\Frontend\Potensi;
use App\Models\Highlight;
use App\Models\Profil;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kades = Kades::latest()->limit(1)->get();
        $perangkat = Perangkat::all();
        $highlights = Highlight::all();
        $profil = Profil::latest()->limit(1)->get();
        return view('frontend.beranda.beranda', compact('highlights', 'profil', 'perangkat', 'kades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
