<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Katagori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::with('katagori','gambar')->get();
        return view('admin.kamar.bookingkamar', ['kamar' => $kamar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $katagori = Katagori::all();
        return view('admin.kamar.create_kamar', ['katagori' => $katagori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $kamar = Kamar::create([
            'nomor_kamar' => $request->input('nomor_kamar'),
            'harga' => $request->input('harga'),
            'katagori_id' => $request->input('katagori_id'),
            'kapasitas' => $request->input('kapasitas'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect('kamar');
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
        $katagori = Katagori::all();
        $kamar = Kamar::with('katagori')->findOrFail($id);

        return view('admin.kamar.edit_kamar', ['kamar' => $kamar, 'katagori' => $katagori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->nomor_kamar = $request->input('nomor_kamar');
        $kamar->katagori_id=$request->input('katagori_id');
        $kamar->harga = $request->input('harga');
        $kamar->kapasitas = $request->input('kapasitas');
        $kamar->keterangan = $request->input('keterangan');

        $kamar->save();

        return redirect('kamar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kamar::destroy($id);

        return redirect('kamar');
    }
}
