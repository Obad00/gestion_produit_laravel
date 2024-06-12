<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ClientController extends Controller
{
public function listeClients()
{
    // Récupérer les utilisateurs ayant le rôle "client"
    $clients = User::where('role', 'client')->get();

    // Passer les utilisateurs filtrés à la vue
    return view('clients.liste', compact('clients'));
}
    public function dashboard()
    {
        $produits = Produit::all();
        return view('clients.dashboard', compact('produits'));
    }

    public function commandes()
    {
        // Récupérer les commandes de l'utilisateur connecté
        $commandes = Commande::where('user_id', Auth::id())->get();

        // Passer les commandes à la vue et l'afficher
        return view('clients.commandes', ['commandes' => $commandes]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        $produit = Produit::findOrFail($request->produit_id);

        // Récupérer les informations du client depuis l'utilisateur authentifié
        $user = Auth::user();

        $commande = new Commande();
        $commande->reference = uniqid('CMD-');
        $commande->nom_client = $user->name;
        $commande->adresse_client = $user->adresse; 
        $commande->telephone_client = $user->telephone; 
        $commande->montant = $produit->price * $request->quantity;
        $commande->user_id = $user->id;
        $commande->save();

        return redirect()->route('clients.dashboard')->with('success', 'Commande passée avec succès !');
    }
}
