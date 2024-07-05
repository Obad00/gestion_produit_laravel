<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'nom_client', 'adresse_client', 'telephone_client', 'statut', 'montant'];
    
    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->reference = 'CMD-' . strtoupper(uniqid());
        });
    }
}
