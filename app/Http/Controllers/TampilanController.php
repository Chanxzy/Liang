<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kamar;

class TampilanController extends Controller
{
    public function index(){

        return view('user.index');
    }

    public function amenities(){

        return view('user.amenities');
    }
    
    public function booking(){

        return view('user.booking');
    }

    public function gallery(){

        return view('user.gallery');
    }

    public function contact(){

        return view('user.contact');
    }

    public function detailkamar($id){

        $kamar = Kamar::with('katagori','gambar')->where('id', $id)->get();
        return view('user.room.murai', ['kamar' => $kamar]);
    }


}
