<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_get() {
        return view('login');
    }

    public function login_post (Request $request) {
        
        $auth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password, 
            
        ]);
        
        if(!$auth) {
            return redirect()->back();
        }

        return redirect('/home');
    }

    public function logout() {
        Auth::logout(auth()->user());
        return redirect('/');
    }
}
