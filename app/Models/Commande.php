<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['produit_ids', 'nom_client', 'adresse_client', 'telephone_client', 'statut'];
    
    protected $casts = [
        'produit_ids' => 'array'
    ];
}
