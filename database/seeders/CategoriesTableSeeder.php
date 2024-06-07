<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Ordinateurs Portables',
            'Smartphones',
            'Tablettes',
            'Accessoires Informatiques',
            'Composants PC',
            'Périphériques de Jeu',
            'Télévisions et Moniteurs',
            'Appareils Photo et Caméras',
            'Logiciels',
            'Domotique et Objets Connectés'
        ];

        foreach ($categories as $categorie) {
            DB::table('categories')->insert([
                'libelle' => $categorie,
                'description' => Str::random(50), // Description aléatoire
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
