<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{

    public function afficherPanier()
    {
        $panier = session('panier', []);
        return view('paniers.index', compact('panier'));
    }
    public function ajouterAuPanier(Request $request, Produit $produit)
    {
        // Logique pour ajouter le produit au panier
        // Par exemple, stockez les produits ajoutés au panier dans la session
        $panier = $request->session()->get('panier', []);
        $panier[$produit->id] = $panier[$produit->id] ?? 0;
        $panier[$produit->id]++;
        $request->session()->put('panier', $panier);

        return redirect()->back()->with('status', 'Produit ajouté au panier avec succès');
    }
}
