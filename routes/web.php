<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/', function () {
    return view('welcome');
});


//Cette route c'est pour permettre d'acceder à l'ensemble des produits
Route::get('produits', [ProduitController::class, 'index'])->name('produits.index');

//C'est la route qui mène vers le formulaire d'ajout d'un produit
Route::get('produits/create', [ProduitController::class, 'create']);
Route::post('produits', [ProduitController::class, 'store']);