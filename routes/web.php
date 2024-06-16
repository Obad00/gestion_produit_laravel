<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

Route::get('/', [ProduitController::class ,'vue_clients']);

Route::middleware(['admin'])->group(function () {

    // Route pour afficher l'ensemble des produits
    Route::get('produits', [ProduitController::class, 'index'])->name('produits.index');

    // Route pour afficher les détails d'un produit
    Route::get('produits/{id}', [ProduitController::class, 'show'])->name('produits.show');

    // Route pour accéder au formulaire d'ajout d'un produit
    Route::get('admin/produits/create', [ProduitController::class, 'create'])->name('produits.create');
    // Route pour enregistrer un nouveau produit
    Route::post('produits', [ProduitController::class, 'store']);

    // Routes pour afficher et modifier un produit
    Route::get('produits/{id}/edit', [ProduitController::class, 'edit']);
    Route::put('produits/{id}', [ProduitController::class, 'update'])->name('produits.update');

    // Route pour supprimer un produit
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

    // Route pour afficher les détails d'une catégorie
    Route::get('categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');

    // Route pour afficher l'ensemble des commandes (accès admin)
    Route::get('admin/commandes', [CommandeController::class, 'index'])->name('commandes.index');

    // Route pour afficher la liste des clients (accès admin)
    Route::get('/clients', [ClientController::class, 'listeClients'])->name('clients.liste');

});



//Affichage details produits pour les clients
Route::get('clients/{id}', [ProduitController::class, 'showclient'])->name('clients.show'); 



//Les route por nous permettre que le client puisse ajouter d'abord au panier
Route::post('/ajouter-au-panier/{produit}', [PanierController::class, 'ajouterAuPanier'])->name('ajouter-au-panier');

//Cella va nous permettre d'acceder à notre panier
Route::get('/paniers', [PanierController::class, 'afficherPanier'])->name('paniers.index');

Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');


//Cette juste pour le traitement de la commande
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');

//Celle-ci c'est pour nous retourner vers notre page de confirmation de la commande
Route::get('/confirmation', function () {
    return view('paniers.confirmation');
})->name('paniers.confirmation');

//Ces routes vont nous permettre de gerer l'authentification et le traitement des donnée de l'utilisateur
Route::get('/login', [AuthController::class, 'login'])->name('auth.login'); 
Route::post('/login', [AuthController::class, 'dologin']); 

// Afficher le formulaire d'inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register'); 

// Traitement du formulaire d'inscription
Route::post('/register', [AuthController::class, 'register']); 

//Cette route permet à l'utilisateur de se deconnecter
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/client', [ClientController::class, 'dashboard'])->name('clients.dashboard');

Route::get('/client/commandes', [ClientController::class, 'commandes'])->name('clients.commandes');


Route::get('/recherche-produits', [ProduitController::class, 'rechercherProduits'])->name('recherche.produits');





