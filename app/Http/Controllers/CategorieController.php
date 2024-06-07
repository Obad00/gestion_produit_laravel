<?php

namespace App\Http\Controllers;
use App\Models\Categorie;


use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //Affichage des categories
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

//Permet de faire la création et le traitement pour la création d'une categorie
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')->with('status', 'Catégorie créée avec succès.');
    }

    //Pour faire la modification d'une categorie
    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie->update($request->all());

        return redirect()->route('categories.index')->with('status', 'Catégorie mise à jour avec succès.');
    }

}
