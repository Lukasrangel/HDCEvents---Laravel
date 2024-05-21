<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public static function store(Request $requests) {
        
        $data = $requests->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]
        );

        if($requests->passwd != $requests->passwd_ok){
            return redirect('cadastrar')->with("errormsg", 'Campos de senha não conferem');
        }
       
        $user = new User;

        $user->name = $requests->user;
        $user->email = $requests->email;
        $user->password = $requests->passwd;
        $user->remember_token = $requests->_token;

        $user->save();

        return redirect('criar-evento');
    }

   
}
