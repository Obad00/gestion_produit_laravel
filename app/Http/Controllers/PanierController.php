<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function afficherPanier()
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            // Rediriger vers la page de connexion
            return redirect()->route('auth.login')->with('status', 'Veuillez vous connecter pour voir votre panier');
        }
    
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
    
        // Récupérer les produits du panier de l'utilisateur depuis la session
        $panier = session()->get('panier_' . $user->id, []);
    
        // Charger les détails des produits à partir de la base de données
        $produits = Produit::whereIn('id', array_keys($panier))->get();
    
        // Retourner la vue avec les données du panier
        return view('paniers.index', compact('panier', 'produits'));
    }
    

    public function ajouterAuPanier(Request $request, Produit $produit)
    {
        // Récupérer l'utilisateur connecté, s'il y en a un
        $user = Auth::user();
        
        // Générer une clé de session unique pour le panier
        $panierKey = $user ? 'panier_' . $user->id : 'panier_anon';
        
        // Récupérer le panier actuel de la session ou créer un nouveau panier
        $panier = session()->get($panierKey, []);
        
        // Ajouter le produit au panier ou incrémenter la quantité s'il est déjà dans le panier
        if (isset($panier[$produit->id])) {
            $panier[$produit->id]++;
        } else {
            $panier[$produit->id] = 1;
        }
        
        // Stocker le panier mis à jour dans la session
        session()->put($panierKey, $panier);
        
        return redirect()->back()->with('status', 'Produit ajouté au panier avec succès');
    }
    
}
