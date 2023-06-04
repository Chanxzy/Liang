<?php

namespace App\Http\Controllers;
use App\Models\Katagori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katagori = Katagori::all();
        return view('admin.katagori.katagori',['katagori' => $katagori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.katagori.createkatagori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $katagori = Katagori::create([
            'nama_katagori' => $request->input('nama_katagori'),
        ]);

        return redirect('katagori');

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
        
        $katagori = Katagori::findOrFail($id);

        return view('admin.katagori.editkatagori',['katagori' => $katagori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $katagori = Katagori::findOrFail($id);
        $katagori->nama_katagori = $request->input('nama_katagori');

        $katagori->save();

        return redirect('katagori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $katagori = Katagori::destroy($id);

        return redirect('katagori');
    }
}
