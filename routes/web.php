<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KatagoriController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\GambarController;


//Tampilan User
Route::get('/', [TampilanController::class, 'index']);
Route::get('/amenities', [TampilanController::class, 'amenities']);
Route::get('/booking', [TampilanController::class, 'booking']);
Route::get('/gallery', [TampilanController::class, 'gallery']);
Route::get('/contact', [TampilanController::class, 'contact']);
Route::get('/detailkamar/{id}', [TampilanController::class, 'detailkamar']);

//dashboard
Route::get('/kamar',[KamarController::class, 'index']);
Route::get('/katagori',[KatagoriController::class, 'index']);
Route::get('/user',[AuthController::class, 'user']);
Route::get('/pesanan',[PesananController::class, 'index']);
Route::get('/gambar',[GambarController::class, 'index']);


//AuthController
Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name("dashboard");
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name("register");
Route::post('/register', [AuthController::class, 'register']);

//CRUD Kamar
Route::get('/tambahkamar', [KamarController::class, 'create'])->name("tambahkamar");
Route::post('/tambahkamar', [KamarController::class, 'store']);

Route::get('/updatekamar/{id}', [KamarController::class, 'edit'])->name("updatekamar.edit");
Route::post('/updatekamar/{id}', [KamarController::class, 'update'])->name("updatekamar.update");

Route::get('/deletekamar/{id}', [KamarController::class, 'destroy'])->name("deletekamar.destroy");

//CRUD AKUN
Route::get('/tambahakun', [AuthController::class, 'create'])->name("tambahakun");
Route::post('/tambahakun', [AuthController::class, 'store']);

Route::get('/updateakun/{id}', [AuthController::class, 'edit'])->name("updateakun.edit");
Route::post('/updateakun/{id}', [AuthController::class, 'update'])->name("updateakun.update");

Route::get('/deleteakun/{id}', [AuthController::class, 'destroy'])->name("deleteakun.destroy");

//CRUD Katagori
Route::get('/tambahkatagori', [KatagoriController::class, 'create'])->name("tambahkatagori");
Route::post('/tambahkatagori', [KatagoriController::class, 'store']);

Route::get('/updatekatagori/{id}', [KatagoriController::class, 'edit'])->name("updatekatagori.edit");
Route::post('/updatekatagori/{id}', [KatagoriController::class, 'update'])->name("updatekatagori.update");

Route::get('/deletekatagori/{id}', [KatagoriController::class, 'destroy'])->name("deleteakun.destroy");

//CRUD Pesanan
// Route::get('/tambahpesanan/{id}', [PesananController::class, 'create'])->name("tambahpesanan");
Route::post('/tambahpesanan/{id}', [PesananController::class, 'store'])->name("tambahpesanan.store");

Route::get('/updatepesanan/{id}', [PesananController::class, 'edit'])->name("updatepesanan.edit");
Route::post('/updatepesanan/{id}', [PesananController::class, 'update'])->name("updatepesanan.update");

Route::get('/deletepesanan/{id}', [PesananController::class, 'destroy'])->name("deleteakun.destroy");

//CRUD Gambar
Route::get('/tambahgambar', [GambarController::class, 'create'])->name("tambahgambar");
Route::post('/tambahgambar', [GambarController::class, 'store']);

Route::get('/deletegambar/{id}', [GambarController::class, 'destroy'])->name("deleteakun.destroy");

