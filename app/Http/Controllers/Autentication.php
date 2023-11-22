<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autentication extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'), 'status' => 'ACTIVO'])) {
            return back()->withErrors('Nombre de usuario o contraseña incorrecta.');
        }

        // dd(Auth::user());

        return redirect()->intended('admin');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
