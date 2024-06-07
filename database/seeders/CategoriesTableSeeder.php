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
            [
                'libelle' => 'Ordinateurs Portables',
                'description' => 'Des ordinateurs portables pour tous vos besoins, qu\'ils soient professionnels ou personnels.'
            ],
            [
                'libelle' => 'Smartphones',
                'description' => 'Les derniers modèles de smartphones avec des fonctionnalités avancées.'
            ],
            [
                'libelle' => 'Tablettes',
                'description' => 'Des tablettes performantes pour le travail, les loisirs et l\'éducation.'
            ],
            [
                'libelle' => 'Accessoires Informatiques',
                'description' => 'Tous les accessoires nécessaires pour compléter votre expérience informatique.'
            ],
            [
                'libelle' => 'Composants PC',
                'description' => 'Cartes graphiques, processeurs, mémoires et autres composants essentiels pour monter ou améliorer votre PC.'
            ],
            [
                'libelle' => 'Périphériques de Jeu',
                'description' => 'Claviers, souris, casques et autres périphériques conçus pour les gamers.'
            ],
            [
                'libelle' => 'Télévisions et Moniteurs',
                'description' => 'Écrans haute définition pour une expérience visuelle exceptionnelle.'
            ],
            [
                'libelle' => 'Appareils Photo et Caméras',
                'description' => 'Appareils photo et caméras de haute qualité pour capturer tous vos moments importants.'
            ],
            [
                'libelle' => 'Logiciels',
                'description' => 'Systèmes d\'exploitation, applications et jeux pour tous vos besoins informatiques.'
            ],
            [
                'libelle' => 'Domotique et Objets Connectés',
                'description' => 'Les dernières innovations en matière de domotique et d\'objets connectés pour une maison intelligente.'
            ],
        ];

        foreach ($categories as $categorie) {
            DB::table('categories')->insert([
                'libelle' => $categorie['libelle'],
                'description' => $categorie['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
