<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('logout', 'Peringatan!! kamu baru saja logout dari akun kamu');
    }
}
