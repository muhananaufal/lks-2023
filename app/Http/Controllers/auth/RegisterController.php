<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function register()
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
        ]);
        auth()->login($user);
        return redirect()->route('dashboard')->with('register', 'Selamat datang!! kamu baru saja membuat akun baru');
    }
}
