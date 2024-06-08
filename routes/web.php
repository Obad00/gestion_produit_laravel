<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\AuthController;

Route::get('/', [ProduitController::class ,'vue_clients']);

Route::middleware([EnsureTokenIsValid::class])->group(function () {

    //Cette route c'est pour permettre d'acceder à l'ensemble des produits
Route::get('produits', [ProduitController::class, 'index'])->name('produits.index');

//C'est la route qui mène vers le formulaire d'ajout d'un produit
Route::get('produits/create', [ProduitController::class, 'create']);
Route::post('produits', [ProduitController::class, 'store']);

//les routes pour afficher et modifier un produit
Route::get('produits/{id}/edit', [ProduitController::class, 'edit']);
Route::put('produits/{id}', [ProduitController::class, 'update'])->name('produits.update');

//Cette route c'est pour la suppression d'un produit
Route::delete('produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');

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

// Route pour supprimer une catégorie
Route::delete('categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

//Cette va permettre à l'administrateur de voir l'ensemble des commanes qui ont été faites
Route::get('admin/commandes', [CommandeController::class, 'index'])->name('commandes.index');



});



//Affichage details produits
Route::get('produits/{id}', [ProduitController::class, 'show'])->name('produits.show'); 

// Route pour afficher les détails d'une catégorie
Route::get('categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');

//Les route por nous permettre que le client puisse ajouter d'abord au panier
Route::post('/ajouter-au-panier/{produit}', [PanierController::class, 'ajouterAuPanier'])->name('ajouter-au-panier');

//Cella va nous permettre d'acceder à notre panier
Route::get('/paniers', [PanierController::class, 'afficherPanier'])->name('paniers.index');

//Cette juste pour le traitement de la commande
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');

//Celle-ci c'est pour nous retourner vers notre page de confirmation de la commande
Route::get('/confirmation', function () {
    return view('paniers.confirmation');
})->name('paniers.confirmation');

//Ces routes vont nous permettre de gerer l'authentification et le traitement des donnée de l'utilisateur
Route::get('/login', [AuthController::class, 'login'])->name('auth.login'); 
Route::post('/login', [AuthController::class, 'dologin']); 

//Cette route permet à l'utilisateur de se deconnecter
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
