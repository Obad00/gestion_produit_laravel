<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    public function dologin(LoginRequest $request)
{
    $credentials = $request->validated();

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('produits.index');
    }

    return redirect()->route('auth.login')->withErrors([
        'email' => 'Email invalide'
    ])->withInput($request->only('email'));
}


       public function logout(Request $request)
       {
           Auth::logout(); // Déconnexion de l'utilisateur
           
           
           return redirect('/'); // Redirection vers la page d'accueil ou une autre page après la déconnexion
       }
}
