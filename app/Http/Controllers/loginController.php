<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function auth(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],
        [
            'email.required' => "Preencha o campo email",
            'email.email' => 'Email inválido',
            'password.required' => 'Insira uma senha',
        ],
    );

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/criar-evento');
        } else {
            return redirect('/entrar')->with('errorAuth', 'Login ou senha incorretos.');
        }

    }

    public function logout(Request $request) {
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
