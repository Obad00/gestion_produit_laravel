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
    'libelle' => 'Pommes',
    'description' => 'Des pommes fraîches et croquantes pour toutes vos envies de fruits.'
],
[
    'libelle' => 'Bananes',
    'description' => 'Les bananes, riches en potassium et idéales pour une collation rapide.'
],
[
    'libelle' => 'Tomates',
    'description' => 'Des tomates juteuses pour agrémenter vos salades et plats cuisinés.'
],
[
    'libelle' => 'Carottes',
    'description' => 'Des carottes croquantes, riches en vitamines, pour toutes vos recettes.'
],
[
    'libelle' => 'Pommes de Terre',
    'description' => 'Pommes de terre polyvalentes pour la cuisson, la friture et la purée.'
],
[
    'libelle' => 'Épinards',
    'description' => 'Épinards frais pour une touche verte et nutritive dans vos repas.'
],
[
    'libelle' => 'Oranges',
    'description' => 'Oranges juteuses et pleines de vitamine C pour un boost d\'énergie.'
],
[
    'libelle' => 'Fraises',
    'description' => 'Fraises sucrées et savoureuses pour vos desserts et snacks.'
],
[
    'libelle' => 'Concombres',
    'description' => 'Concombres frais et croquants pour vos salades et encas.'
],
[
    'libelle' => 'Courgettes',
    'description' => 'Courgettes polyvalentes pour les sautés, gratins et plats mijotés.'
],
[
    'libelle' => 'Avocats',
    'description' => 'Avocats crémeux, parfaits pour les salades, tartines et guacamoles.'
],
[
    'libelle' => 'Ananas',
    'description' => 'Ananas sucrés et juteux pour une touche exotique à vos plats.'
]
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
