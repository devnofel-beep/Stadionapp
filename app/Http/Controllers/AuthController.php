<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/home');
            }
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

        public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. validasi
        $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // pakai konfirmasi
        ]);

        // 2. simpan
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        // 3. redirect (pilih salah satu)
        return redirect('/login')->with('success','Registrasi berhasil');
        // atau auto login (opsional, lihat bagian bawah)
    }
}