<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //Cette fonction va nous permettre d'afficher les produits
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    //Ces fonctions affichent d'abord la vue pour créer un produit et la seconde pour faire le traitement
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'image_url' => 'nullable|url',
        ]);

        Produit::create($validated);

        return redirect()->route('produits.index');
    }
}
