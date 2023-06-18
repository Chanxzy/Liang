<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Kamar;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('admin.pesanan.pesanan', ['pesanan' => $pesanan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $pesanan = Kamar::findOrFail($id);
        return view('admin.pesanan.create_pesanan', ['pesanan' => $pesanan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $kamar = Kamar::findOrFail($id);
        dd($request);
        //check ketersediaan kamar 
        $checkbooking = Pesanan::where("checkin", ">=", $request->input("checkin"))
        ->where("checkout", "<=", $request->input("checkin"))
        ->where("checkin", ">=", $request->input("checkout"))
        ->where("checkout", "<=", $request->input("checkout"))
        ->get();

        if($checkbooking){
            return redirect()->back()->withErrors([
                'konfliktanggal'=> 'Tanggal Tidak Tersedia'
            ]);
        }
        

        //hitung total bayar
        $checkin = Carbon::parse($request->input('checkin'));
        $checkout = Carbon::parse($request->input('checkout'));
        $malam = $checkout->diffInDays($checkin);
        $totalharga = ($kamar->harga * $malam);

        $pesanan = Pesanan::create([
            'id_pelanggan' => Auth::user()->id,
            'id_kamar' => $id,
            'checkin' => $request->input('checkin'),
            'checkout' => $request->input('checkout'),
            'jumlah' => $request->input('jumlah'),
            'total' => $totalharga,
        ]);

        return redirect('pesanan');
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
