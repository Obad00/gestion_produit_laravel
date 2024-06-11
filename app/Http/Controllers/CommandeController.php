<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('status', 'Vous devez être connecté pour passer une commande.');
        }
    
        // Récupérer l'utilisateur connecté
        $user = Auth::user();
    
        // Récupérer le panier de l'utilisateur depuis la session
        $panier = session()->get('panier_' . $user->id, []);
    
        // Récupérer tous les produits du panier en une seule requête
        $produits = Produit::whereIn('id', array_keys($panier))->get();
    
        // Calculer le montant total de la commande
        $montantTotal = 0;
        foreach ($produits as $produit) {
            if (isset($panier[$produit->id])) {
                $quantite = $panier[$produit->id];
                $montantTotal += $produit->prix * $quantite;
            }
        }
    
        // Créer une nouvelle commande
        $commande = new Commande();
        $commande->reference = 'CMD-' . strtoupper(Str::random(10));
        $commande->nom_client = $request->nom_client;
        $commande->adresse_client = $request->adresse_client;
        $commande->telephone_client = $request->telephone_client;
        $commande->statut = 'en cours';
        $commande->montant = $montantTotal;
        $commande->user_id = $user->id; // Assigner l'ID de l'utilisateur
        $commande->save();

        // Associer les produits sélectionnés à cette commande
        foreach ($panier as $idProduit => $quantite) {
            $commande->produits()->attach($idProduit, ['quantite' => $quantite]);
        }

        // Vider le panier
        session()->forget('panier');

        // Rediriger avec un message de succès
        return redirect()->route('paniers.confirmation')->with('success', 'Votre commande a été passée avec succès!');
    }

    public function index()
    {
        // Récupérer toutes les commandes
        $commandes = Commande::with('produits')->get();

        // Retourner la vue avec les commandes
        return view('admin.commandes.index', compact('commandes'));
    }
}
