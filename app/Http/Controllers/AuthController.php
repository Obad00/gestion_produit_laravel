<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        // Sauvegarder le panier actuel dans la session si non connecté
        if (!Auth::check()) {
            session()->put('panier_temporaire', session()->get('panier_temporaire', []));
        }
        return view('auth.login');
    }

    private function mergePanierTemporaire($user)
    {
        // Récupérer le panier temporaire de la session
        $panierTemporaire = session()->get('panier_temporaire', []);
        if (empty($panierTemporaire)) {
            return;
        }

        // Récupérer le panier de l'utilisateur
        $panierUtilisateur = session()->get('panier_'. $user->id, []);

        // Fusionner les deux paniers
        foreach ($panierTemporaire as $idProduit => $quantite) {
            if (isset($panierUtilisateur[$idProduit])) {
                $panierUtilisateur[$idProduit] += $quantite;
            } else {
                $panierUtilisateur[$idProduit] = $quantite;
            }
        }

        // Mettre à jour le panier de l'utilisateur dans la session
        session()->put('panier_'. $user->id, $panierUtilisateur);
        session()->forget('panier_temporaire');
    }

    public function dologin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $role = $user->role;

            // Fusionner le panier temporaire avec celui de l'utilisateur connecté
            $this->mergePanierTemporaire($user);

            switch ($role) {
                case User::ROLE_ADMIN:
                    return redirect()->route('produits.index');
                case User::ROLE_CLIENT:
                    return redirect()->route('clients.dashboard');
                default:
                    return redirect()->route('produits.index');
            }
        }

        return redirect()->route('auth.login')->withErrors([
            'email' => 'Email ou mot de passe invalide'
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:client,admin',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('auth.login')->with('success', 'Inscription réussie. Veuillez vous connecter.');
    }
}
