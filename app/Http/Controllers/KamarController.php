<?php

namespace App\Http\Controllers;
use App\Models\Kamar;

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
        $kamar = Kamar::all();
        return view('admin.kamar.bookingkamar',['kamar' => $kamar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kamar.create_kamar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $file = $request->file('Gambar');

        // $filename = time() . '_' . $file->getClientOriginalName();
        // $path = $file->storeAs('images', $filename);
        // $url = Storage::url($path);

        // dd($url);

        
        if ($request->hasFile('Gambar')) {
            $filename = $request->file('Gambar')->getClientOriginalName();
            $request->file('Gambar')->move('hasilgambar/', $filename);
            $url = asset('hasilgambar/' . $filename);
        }

        $kamar = Kamar::create([
            'nomor_kamar' => $request->input('nomor_kamar'),
            'Gambar' => $url,
            'harga' => $request->input('harga'),
            'katagori' => $request->input('katagori'),
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
        
        $kamar = Kamar::findOrFail($id);

        return view('admin.kamar.edit_kamar',['kamar' => $kamar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->nomor_kamar = $request->input('nomor_kamar');
        $kamar->Gambar = $request->input('Gambar');
        $kamar->harga = $request->input('harga');
        $kamar->katagori = $request->input('katagori');
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
        $kamar = Kamar::destroy($id);

        return redirect('kamar');
    }
}
