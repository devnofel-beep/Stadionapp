<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Halaman Login
    public function index()
    {
        return view('auth.login');
    }

    //prose login
    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
            'email' => ['required','email'],

            'password' => ['required']
       ]);

       if(Auth::attempt($credentials)){
        $request->session()->regenerate();

        return redirect('/');
       }

       return back()->with(
        'error',
        'Email atau password salah'
       );
    }

    //log out
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
}
