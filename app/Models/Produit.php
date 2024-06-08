<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'prix', 'categorie_id', 'image_url', 'reference'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commandes()
{
    return $this->belongsToMany(Commande::class)->withPivot('quantite');
}

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->reference = 'PROD-' . strtoupper(uniqid());
        });
    }
}
