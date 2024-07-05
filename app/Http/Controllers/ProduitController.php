<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProduitController extends Controller
{

    public function  vue_clients(){

        $produits= Produit::all();
        return view('/clients/index', compact('produits'));
    }

    //Cette fonction va nous permettre d'afficher les produits
    public function index()
    {
        $produits = Produit::all();
        return view('admin/produits.index', compact('produits'));
    }

    //Ces fonctions affichent d'abord la vue pour créer un produit et la seconde pour faire le traitement
    public function create()
    {
        $categories = Categorie::all();
        return view('admin/produits.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
        ]);

        Produit::create($validated);

        return redirect()->route('produits.index');
    }

    //Ces routes permettent d'afficher le formulaire de modification d'un produit en recuperant l'ID du produit 
    //Apprès viens la fonction qui recupere toutes les données à modifiées et enfin la fonction qui traite

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Categorie::all();
        return view('admin/produits.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
        ]);

        $produit->update($validated);

        return redirect()->route('produits.index');
    }

    //Fonction pour supprimer un produit
    public function destroy($id)
{
    $produit = Produit::findOrFail($id);
    $produit->delete();

    return redirect()->route('produits.index')->with('status', 'Le produit a été supprimé avec succès.');
}

   //Pour afficher les details de la vue
   public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('admin/produits.show', compact('produit'));
    }

    public function showclient($id)
    {
        $produit = Produit::findOrFail($id);
        return view('clients.show', compact('produit'));
    }

    public function rechercherProduits(Request $request)
    {
        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->input('q');

        // Rechercher les produits correspondants au terme de recherche
        $produits = Produit::where('nom', 'like', '%' . $searchTerm . '%')
                           ->orWhere('description', 'like', '%' . $searchTerm . '%')
                           ->paginate(4); // Paginer les résultats

        // Retourner la vue avec les produits correspondants
        return view('recherche_produits', compact('produits'));
    }
}
