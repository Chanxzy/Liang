<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KatagoriController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\GambarController;

use App\Models\Pesanan;


//Tampilan User
Route::get('/', function(){
    return view('user.index');
});
Route::get('/test', function(){
    return view('test');
});
Route::get('/amenities', function(){
    return view('user.amenities');
});
Route::get('/booking', function(){
    return view('user.booking');
});
Route::get('/gallery', function(){
    return view('user.gallery');
});
Route::get('/contact', function(){
    return view('user.contact');
});


Route::middleware(['isadmin'])->group(function(){
    //dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name("dashboard");
    Route::get('/kamar',[KamarController::class, 'index']);
    Route::get('/katagori',[KatagoriController::class, 'index']);
    Route::get('/user',[AuthController::class, 'user'])->name('user');
    Route::get('/pesanan',[PesananController::class, 'index']);
    Route::get('/report',[PesananController::class, 'report'])->name('report');
    Route::post('/pesanan/cetak_pdf',[PesananController::class, 'cetak_pdf'])->name("cetak_pdf");
    Route::get('/gambar',[GambarController::class, 'index']);

    //CRUD Kamar
    Route::get('/tambahkamar', [KamarController::class, 'create'])->name("tambahkamar");
    Route::post('/tambahkamar', [KamarController::class, 'store']);
    Route::get('/updatekamar/{id}', [KamarController::class, 'edit'])->name("updatekamar.edit");
    Route::post('/updatekamar/{id}', [KamarController::class, 'update'])->name("updatekamar.update");
    Route::get('/deletekamar/{id}', [KamarController::class, 'destroy'])->name("deletekamar.destroy");

    //CRUD AKUN
    Route::get('/tambahakun', [AuthController::class, 'create'])->name("tambahakun");
    Route::post('/tambahakun', [AuthController::class, 'store']);
    Route::post('/tambahadmin', [AuthController::class, 'create_admin'])->name("tambahadmin");
    Route::get('/updateakun/{id}', [AuthController::class, 'edit'])->name("updateakun.edit");
    Route::post('/updateakun/{id}', [AuthController::class, 'update'])->name("updateakun.update");
    Route::get('/deleteakun/{id}', [AuthController::class, 'destroy'])->name("deleteakun.destroy");
    

    //CRUD Katagori
    Route::get('/tambahkatagori', [KatagoriController::class, 'create'])->name("tambahkatagori");
    Route::post('/tambahkatagori', [KatagoriController::class, 'store']);
    Route::get('/updatekatagori/{id}', [KatagoriController::class, 'edit'])->name("updatekatagori.edit");
    Route::post('/updatekatagori/{id}', [KatagoriController::class, 'update'])->name("updatekatagori.update");
    Route::get('/deletekatagori/{id}', [KatagoriController::class, 'destroy'])->name("deleteakun.destroy");

    //pesanan
    Route::get('/updatepesanan/{id}', [PesananController::class, 'edit'])->name("updatepesanan.edit");
    Route::post('/updatepesanan/{id}', [PesananController::class, 'update'])->name("updatepesanan.update");

    //CRUD Gambar
    Route::get('/tambahgambar', [GambarController::class, 'create'])->name("tambahgambar");
    Route::post('/tambahgambar', [GambarController::class, 'store']);
    Route::get('/deletegambar/{id}', [GambarController::class, 'destroy'])->name("deleteakun.destroy");

});


Route::middleware(['isuser'])->group(function(){
    Route::get('/detailkamar/{id}', [KamarController::class, 'detailkamar']);
    //order
    Route::get('/order', [PesananController::class, 'order']);

    //CRUD Pesanan
    Route::post('/tambahpesanan/{id}', [PesananController::class, 'store'])->name("tambahpesanan.store");
    Route::post('/uploadbukti/{id}', [PesananController::class, 'uploadbukti'])->name("uploadbukti.uploadbukti");
    Route::post('/deletepesanan/{id}', [PesananController::class, 'destroy'])->name("deletepesanan.destroy");
});

//AuthController
Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/forgotpass', [AuthController::class, 'forgotpass'])->name('forgotpass');
Route::post('/resetpassword/{token}', [AuthController::class, 'resetpassword'])->name('resetpassword');
Route::get('/formforgotpass', [AuthController::class, 'formforgotpass'])->name('formforgotpass');
Route::get('/formresetpassword/{token}', [AuthController::class, 'formresetpassword'])->name('formresetpassword');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name("register");
Route::post('/register', [AuthController::class, 'register']);



