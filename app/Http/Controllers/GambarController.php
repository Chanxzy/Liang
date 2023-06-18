<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Gambar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gambar = Gambar::all();
        return view('admin.gambar.gambarkamar', ['gambar' => $gambar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.gambar.create_gambar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move('gambarkamar/', $filename);
            $url = asset('gambarkamar/' . $filename);
        }

        $gambar = Gambar::create([
            'gambar' => $url,
            'kamar_id' => $request->input('kamar_id'),
        ]);

        return redirect('gambar');
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
