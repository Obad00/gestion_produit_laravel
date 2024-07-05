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
        // Valider les données du formulaire
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'adresse_client' => 'required|string|max:255',
            'telephone_client' => 'required|string|max:20',
        ], [
            'nom_client.required' => 'Le nom du client est requis.',
            'adresse_client.required' => 'L\'adresse du client est requise.',
            'telephone_client.required' => 'Le numéro de téléphone du client est requis.',
        ]);
    
        // Si la validation échoue, Laravel redirigera automatiquement avec les erreurs
    
        // Continuer le traitement si la validation passe
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
    
        // Vider le panier de l'utilisateur connecté
        session()->forget('panier_' . $user->id);
    
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
