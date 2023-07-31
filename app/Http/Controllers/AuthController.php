<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Pesanan;
use App\Mail\forgotpass;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    //dashboard admin
    public function dashboard(Request $request)
    {
        //diagram
        $tahun=date('Y');
        $pesanan=Pesanan::select(DB::raw('MONTH(checkin) as month'),DB::raw('COUNT(*) as pesanan'),DB::raw('YEAR(checkin) as year'))
        ->where('status_bayar','sudah')
        ->whereYear('checkin',$tahun)
        ->groupBy('month','year')
        ->get();

        //totaluser
        $user=User::count();
        $statusberhasil=Pesanan::where('status_bayar','sudah')->count();
        $statusbelum=Pesanan::where('status_bayar','belum')->count();
        $statusbatal=Pesanan::where('status_bayar','batal')->count();
        return view('admin.dashboard', ['pesanan'=>$pesanan, 
        'user'=>$user, 'statusberhasil'=>$statusberhasil, 
        'statusbelum'=>$statusbelum, 'statusbatal'=>$statusbatal]);
    }
    
    //mengatur login
    public function login(Request $request)
    {
    $credentials = $request->only('username', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        session()->flash('success', 'Login successful');
        if ($user->role == "admin") {
            return redirect()->intended('/dashboard');
        }
        return redirect()->intended('/');
    }

    return redirect()->back()->withErrors([
        'error' => 'Wrong Username or Password.',
    ]);
}

    //register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::login($user);
        session()->flash('success', 'Registration successful');
        return redirect()->intended('login');
    }


    //tambah admin
    public function create_admin(Request $request){

        $role = User::create([
            'role' => $request->input('role'),
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect('user');
    }

    /**
     * CRUD
     */
    public function user()
    {
        $user = User::all();
        return view('admin.akun.regisakun',['user' => $user]);
    }


    public function create()
    {
        return view('admin.akun.create_akun');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect('user');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $user = User::findOrFail($id);

        return view('admin.akun.editakun',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::destroy($id);

        return redirect('user');
    }

    //lupa password
    public function forgotpass(Request $request){
        $user = User::where('email',$request->input('email'))->first();

        $token = Str::random(32);
        DB::table('password_reset_tokens')->insert(['email'=>$user->email, 'token'=>$token]);
        Mail::to($user->email)->send(new forgotpass(['token'=>$token]));
        
        return redirect('/login');
    }

    //formforgotpass berisikan measukan emai;
    public function formforgotpass(){
        return view('auth.forgotpass');
    }

    //form reset password
    public function formresetpassword($token){
        return view('auth.formresetpassword', ['token'=>$token]);
    }

    public function resetpassword(Request $request, $token ){
        
        $user = DB::table('password_reset_tokens')->where('token', $token)->first();
    
        if (!$user) {
            throw new Exception('User not found');
        }
        if ($request->input('password') != $request->input('confirm_password')) {
            throw new Exception('Password not match');
        }
        User::where('email', $user->email)->update(['password'=> bcrypt($request->input('password'))]);
        DB::table('password_reset_tokens')->where('token', $token)->delete();

        return redirect('/login');
    }
    

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}