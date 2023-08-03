<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Kamar;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailCustomer;
use App\Mail\EmailOrder;
use Illuminate\Support\Facades\Queue;
use App\Jobs\UpdateStatus;
use PDF;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $pesanan = DB::table('pesanan')
        ->join('kamar', 'pesanan.id_kamar', '=', 'kamar.id')
        ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
        ->join('katagori', 'kamar.katagori_id', '=', 'katagori.id')
        ->select('pesanan.id as pesanan_id', 'kamar.*', 'users.*', 'katagori.*', 'pesanan.*')
        ->orderByDesc('pesanan.created_at')
        ->get();
        
    return view('admin.pesanan.pesanan', compact('pesanan'));
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
        
        // Check ketersediaan kamar
        $checkbooking = Pesanan::where('id_kamar', '=', $kamar->id)->where(function ($query) use ($request) {
            $query->where('checkin', '<=', $request->input('checkout'))
                ->where('checkout', '>=', $request->input('checkin'));
            })->get();

        if ($checkbooking->isNotEmpty()) {
            return redirect()->back()->withErrors([
                'konfliktanggal' => 'Date not Available'
            ]);
        }

        
        // Hitung total bayar
        $checkin = strtotime($request->input('checkin'));
        $checkout = strtotime($request->input('checkout'));
        $malam = floor(($checkout - $checkin) / (60 * 60 * 24)); // Calculate the number of nights
        $totalharga = $kamar->harga * $malam;
        
        
        $pesanan = Pesanan::create([
            'id_pelanggan' => Auth::user()->id,
            'id_kamar' => $id,
            'checkin' => $request->input('checkin'),
            'checkout' => $request->input('checkout'),
            'jumlah' => $request->input('jumlah'),
            'total' => $totalharga,
        ]);
        
        $kamar = Kamar::with('katagori')->findOrFail($id);
        $admin=User::where('role','admin')->get();

        Mail::to($admin)->send(new EmailOrder(['pesanan'=>$pesanan, 'user'=>Auth::user(), 'kamar'=>$kamar]));
        Queue::after(now()->addSeconds(1), new UpdateStatus);
        

        return redirect('/order');
    }

    public function order()
    {
        if (Auth::check()) {
            $orderbaru = Pesanan::join('kamar', 'pesanan.id_kamar', '=', 'kamar.id')
            ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
            ->join('katagori', 'kamar.katagori_id', '=', 'katagori.id')
            ->select('pesanan.id as id', 'kamar.*', 'users.*', 'katagori.*', 'pesanan.*')
            ->where('id_pelanggan', Auth::user()->id)->whereIn('status_bayar',['belum', 'proses'])->get();

            $orderlama = Pesanan::join('kamar', 'pesanan.id_kamar', '=', 'kamar.id')
            ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
            ->join('katagori', 'kamar.katagori_id', '=', 'katagori.id')
            ->select('pesanan.id as id', 'kamar.*', 'users.*', 'katagori.*', 'pesanan.*')
            ->where('id_pelanggan', Auth::user()->id)->whereIn('status_bayar',['batal', 'sudah','ditolak'])->get();
        }else{
            
            return redirect('/login');
        }
        
        return view('user.order', ['orderbaru' => $orderbaru, 'orderlama' => $orderlama]);
    }

    public function uploadbukti(Request $request, string $id){

        $bukti = Pesanan::findOrFail($id);
        if ($request->hasFile('bukti')) {
            $filename = $request->file('bukti')->getClientOriginalName();
            $request->file('bukti')->move('bukti/', $filename);
            $url = asset('bukti/' . $filename);
            
        }
        $bukti->bukti = $url; 
        $bukti->status_bayar = 'proses';

        $bukti->save();

        return redirect('order');
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

        $pesanan = DB::table('pesanan')
            ->where('pesanan.id', $id)
            ->join('kamar', 'pesanan.id_kamar', '=', 'kamar.id')
            ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
            ->join('katagori', 'kamar.katagori_id', '=', 'katagori.id')
            ->select('pesanan.id as pesanan_id', 'kamar.*', 'users.*', 'katagori.*', 'pesanan.*')
            ->first();

        return view('admin.pesanan.editpesanan', ['pesanan' => $pesanan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesanan = DB::table('pesanan')
            ->where('pesanan.id', $id)
            ->join('kamar', 'pesanan.id_kamar', '=', 'kamar.id')
            ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
            ->join('katagori', 'kamar.katagori_id', '=', 'katagori.id')
            ->select('pesanan.id as pesanan_id', 'kamar.*', 'users.*', 'katagori.*', 'pesanan.*')
            ->first();

        
        $pesanan->status_bayar = $request->input('status_bayar');

        // Save the changes to the database
        DB::table('pesanan')->where('id', $pesanan->pesanan_id)->update(['status_bayar' => $request->input('status_bayar')]);
        Mail::to($pesanan->email)->send(new EmailCustomer(['pesanan'=>$pesanan]));

        return redirect('pesanan');
    }


    //report
    public function report(Request $request)
    {
        $pesanan = DB::table('pesanan')
            ->join('kamar', 'pesanan.id_kamar', '=', 'kamar.id')
            ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
            ->join('katagori', 'kamar.katagori_id', '=', 'katagori.id')
            ->select('pesanan.id as pesanan_id', 'kamar.*', 'users.*', 'katagori.*', 'pesanan.*')
            ->orderByDesc('pesanan.created_at');

        if ($request->query('start')) {
            $pesanan->where('checkin', '>=', $request->query('start'));
        }

        if ($request->query('end')) {
            $pesanan->where('checkin', '<=', $request->query('end'));
        }

        if ($request->query('status')) {
            $pesanan->where('status_bayar', '=', $request->query('status'));
        }

        $pesanan = $pesanan->paginate(5);
        
        return view('admin.report.report', ['pesanan' => $pesanan]);
    }



    public function cetak_pdf(Request $request)
    {
        
    	$query = DB::table('pesanan')
            ->join('kamar', 'pesanan.id_kamar', '=', 'kamar.id')
            ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
            ->join('katagori', 'kamar.katagori_id', '=', 'katagori.id')
            ->select('pesanan.id as pesanan_id', 'kamar.*', 'users.*', 'katagori.*', 'pesanan.*')
            ->orderByDesc('pesanan.created_at')
            ->where('pesanan.status_bayar', '=', 'sudah');

        if (request()->query('start')) {
            $query->where('checkin', '>=', request()->query('start'));
        }

        if (request()->query('end')) {
            $query->where('checkin', '<=', request()->query('end'));
        }

        $pesanan = $query->get();

        //hitung total harga laporan
        $totalharga = 0;
        for ($i=0; $i < count($pesanan) ; $i++) { 
            $totalharga+=$pesanan[$i]->total; 
            
        }

    	$pdf = PDF::loadview('admin.pesanan.ReportPesanan_pdf',['pesanan'=>$pesanan, 'totalharga'=> $totalharga]);
    	return $pdf->download('laporan-pesanan.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status_bayar='batal';
        $pesanan->save();

        return redirect("/order");
    }
}
