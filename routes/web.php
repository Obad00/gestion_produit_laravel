<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;


Route::get('/', function () {
    return view('welcome');
});


//Cette route c'est pour permettre d'acceder à l'ensemble des produits
Route::get('produits', [ProduitController::class, 'index'])->name('produits.index');

//C'est la route qui mène vers le formulaire d'ajout d'un produit
Route::get('produits/create', [ProduitController::class, 'create']);
Route::post('produits', [ProduitController::class, 'store']);

//les routes pour afficher et modifier un produit
Route::get('produits/{id}/edit', [ProduitController::class, 'edit']);
Route::put('produits/{id}', [ProduitController::class, 'update'])->name('produits.update');

//Cette rote c'est pour la suppression d'un produit
Route::delete('produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');

//Affichage details produits
Route::get('produits/{id}', [ProduitController::class, 'show'])->name('produits.show'); 


// Route pour afficher la liste des catégories
Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');

// Route pour afficher le formulaire de création d'une nouvelle catégorie
Route::get('categories/create', [CategorieController::class, 'create'])->name('categories.create');

// Route pour enregistrer une nouvelle catégorie
Route::post('categories', [CategorieController::class, 'store'])->name('categories.store');

// Route pour afficher le formulaire d'édition d'une catégorie
Route::get('categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');

// Route pour mettre à jour une catégorie existante
Route::put('categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');