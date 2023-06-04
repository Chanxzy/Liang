<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }
    
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
            'username' => 'Invalid credentials.',
        ]);
    }
    
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
}