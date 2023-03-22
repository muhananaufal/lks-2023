<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view ('auth.login');
    }
    public function login()
    {
        request()->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (auth()->attempt([
            'email'=>request()->email,
            'password'=>request()->password,
        ])) {
            return redirect()->route('dashboard')->with('login_success', 'Selamat datang kembali!! Kamu berhasil login');
        } else {
            return redirect()->back()->with('login_failed', 'Login gagal!! Silahkan periksa kembali data yang anda masukkan');
        }
    }
}
