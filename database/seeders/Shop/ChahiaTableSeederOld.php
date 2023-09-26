<?php

namespace Database\Seeders\Shop;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class ChahiaTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $categoriesCount = [];
        $categories = [];
        $path = public_path('example/chahia.csv');
        $handle = fopen($path, "r"); // open in readonly mode
        while (($row = fgetcsv($handle, null, ';')) !== false) {
            $category = ($row[4] === '' ? '' : ucfirst(strtolower($row[4])) . ' - ') .
                ucfirst(strtolower($row[3]));
            $price = ((int) str_replace(',', '.', $row[11])) * 1000;
            $name = ucfirst(strtolower($row[1]));
            $data = [
                'id' => $row[0],
                'fr' => $name,
                'en' => '',
                'tnfr' => $name,
                'tnar' => '',
                'ar' => '',
                'category' => $category,
                'price' => $price,
            ];

            if (isset($categoriesCount[$category])) {
                $categoriesCount[$category]++;
                $categories[$category][] = $data;
            } else {
                $categoriesCount[$category] = 1;
                $categories[$category] = [ $data ];
            }
        }

        fclose($handle);
        ksort($categoriesCount);

        unset($categories["CATEGORIE - SCATEGORIE"]);

        ksort($categories);
        ksort($categoriesCount);

        $categories = array_values($categories);
        $categories = [[[ 'id', 'fr', 'en', 'tnfr', 'tnar', 'ar', 'category', 'price']], ...$categories];

        $fp = fopen(public_path('example/chahia2.csv'), 'w');
        foreach($categories as $products) {
            foreach ($products as $product) {
                fputcsv($fp, [...$product, 'category_count' => $categoriesCount[$product['category'] ?? 'category_count'] ?? 'category_count'], ';');
            }
        }
        fclose($fp);

        dd($categoriesCount); // TODO: continue working after meetup with owner
    }
}

/*

Barquettes	barquettes
Boites de conserves
Charcuterie a la cou	Boeuf
Charcuterie libre se	Boeuf
Charcuterie a la cou	Dinde
Charcuterie a la cou	Poulet
Charcuterie libre se	Dinde
Charcuterie libre se	Poulet
Chips
Epices
Epice elkodes
Epices	Epice en poudre
Epices	Epice en feuielle
Fromage	Fromage en piece
Fromage	Fromage en kg
Fromage	Fromage rape
Hrissa
Marinee	Caille
Marinee	Poulet
Marinee	Dinde
Miel
Oeufs	Oeufs vrac
Oeufs	Oeufs
Produits cuits
Produit surgeles	Dinde
Produit surgeles	Boeuf
Produit surgeles	Poulet
Sauces
Variantes	Sans code
Vinaigre
Volaille vrac	Dinde
Volaille vrac	Poulet

*/
