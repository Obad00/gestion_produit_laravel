<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Support\Str;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'adresse_client' => 'required|string|max:255',
            'telephone_client' => 'required|string|max:255',
        ]);

        // Récupérer le panier de la session
        $panier = session('panier', []);

        if (count($panier) == 0) {
            return redirect()->back()->with('status', 'Votre panier est vide.');
        }

        // Calculer le montant total de la commande
        $montantTotal = 0;
        foreach ($panier as $idProduit => $quantite) {
            $produit = Produit::find($idProduit);
            $montantTotal += $produit->prix * $quantite;
        }

        // Créer une nouvelle commande
        $commande = new Commande();
        $commande->reference = 'CMD-' . strtoupper(Str::random(10));
        $commande->nom_client = $request->nom_client;
        $commande->adresse_client = $request->adresse_client;
        $commande->telephone_client = $request->telephone_client;
        $commande->statut = 'en cours';
        $commande->montant = $montantTotal;
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
}
