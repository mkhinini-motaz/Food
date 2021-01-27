<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductsTableSeederForGrocery extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $categoryEauEtBoissongId = $categories->where('name', '=', 'Eau et Boissons')->first()->id;

        $categoryConservesId = $categories->where('name', '=', 'Conserves')->first()->id;
        $categoryPatesRiZChorbaId = $categories->where('name', '=', 'Pates, riz semoule, chorba')->first()->id;
        $categoryBoulangerieId = $categories->where('name', '=', 'Boulangerie')->first()->id;
        $categorySurgeleId = $categories->where('name', '=', 'Surgelé')->first()->id;
        $categoryMaisonId = $categories->where('name', '=', 'Maison')->first()->id;
        $categoryHygieneId = $categories->where('name', '=', 'Hygiéne')->first()->id;
        $categoryPetitDejId = $categories->where('name', '=', 'Petit déjeuner')->first()->id;
        $categorySucrerieId = $categories->where('name', '=', 'Sucrerie et chocolat')->first()->id;
        $testPaginationCategoryId = $categories->where('name', '=', 'Test pagination category')->first()->id;


        Product::factory()->create([
            'name' => '5mira',
            'brand' => 'La patisiere',
            'photo' => 'example/grocery/product/5mira La patisiere.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => '5mira 5 piéces',
            'brand' => 'Venoise',
            'photo' => 'example/grocery/product/5mira Venoise.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 200,
        ]);
        Product::factory()->create([
            'name' => '7lib 1L',
            'brand' => 'Vitalé',
            'photo' => 'example/grocery/product/7lib 1L Vitalé',
            'category_id' => $categoryBoulangerieId,
            'price' => 1200,
        ]);
        Product::factory()->create([
            'name' => 'Chocolat tartiné noisette 1K',
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Chocolat tartiné noisette 1K Said.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 9500,
        ]);
        Product::factory()->create([
            'name' => 'Chocolat tartiné noisette 500Gr',
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Chocolat tartiné noisette 500gr Said.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 5500,
        ]);
        Product::factory()->create([
            'name' => 'Chocolat tartiné 1K',
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Chocolat tartiné 1K Said.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 8000,
        ]);
        Product::factory()->create([
            'name' => 'Chocolat tartiné 150Gr',
            'brand' => 'Vanoise',
            'photo' => 'example/grocery/product/Chocolat tartiné 150gr Vanoise.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 3200,
        ]);
        Product::factory()->create([
            'name' => 'Cookies chocolat',
            'brand' => 'St Michel',
            'photo' => 'example/grocery/product/Cookies chocolat St Michel.jpg',
            'category_id' => $categorySucrerieId,
            'price' => 1250,
        ]);
        Product::factory()->create([
            'name' => 'Créme fraiche',
            'brand' => 'Vitalait',
            'photo' => 'example/grocery/product/Créme fraiche Vitalait.jpg',
            'category_id' => $categorySucrerieId,
            'price' => 3250,
        ]);
        Product::factory()->create([
            'name' => 'Danette chocolat',
            'brand' => 'Délice',
            'photo' => 'example/grocery/product/Danette chocolat Délice.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => 'Farine',
            'brand' => 'Les épis de carthage',
            'photo' => 'example/grocery/product/Farine Les épis de carthage.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 800,
        ]);
        Product::factory()->create([
            'name' => 'Fitox',
            'brand' => 'Choc',
            'photo' => 'example/grocery/product/Fitox Choc.jpg',
            'category_id' => $categoryMaisonId,
            'price' => 4500,
        ]);
        Product::factory()->create([
            'name' => 'Fromage Emmental 100Gr',
            'brand' => 'Président',
            'photo' => 'example/grocery/product/Fromage Emmental 100Gr Président.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 3650,
        ]);
        Product::factory()->create([
            'name' => 'Fromage le cuistot 150Gr',
            'brand' => 'Président',
            'photo' => 'example/grocery/product/Fromage le cuistot 150Gr Président.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 2250,
        ]);
        Product::factory()->create([
            'name' => 'D-Croc Tiramesu 110Gr',
            'brand' => 'Kif',
            'photo' => 'example/grocery/product/Gaufrette D-Croc Tiramesu 110Gr Kif.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 1300,
        ]);
        Product::factory()->create([
            'name' => 'Hrissa 400Gr',
            'brand' => 'Le petit paris',
            'photo' => 'example/grocery/product/Hrissa 400Gr Le petit paris.jpg',
            'category_id' => $categoryConservesId,
            'price' => 1800,
        ]);
        Product::factory()->create([
            'name' => 'Javel 1.5L',
            'brand' => 'Lilas',
            'photo' => 'example/grocery/product/Javel 1.5L Lilas.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 3000,
        ]);
        Product::factory()->create([
            'name' => 'Javel 4.5L',
            'brand' => 'Judy',
            'photo' => 'example/grocery/product/Javel 4.5L Judy.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 8000,
        ]);
        Product::factory()->create([
            'name' => 'Javel 4.75L',
            'brand' => 'Judy',
            'photo' => 'example/grocery/product/Javel 4.75L Judy.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 10000,
        ]);
        Product::factory()->create([
            'name' => 'Lait 1L',
            'brand' => 'Délice',
            'photo' => 'example/grocery/product/Lait 1L Délice.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 1350,
        ]);
        Product::factory()->create([
            'name' => 'Lingette mini',
            'brand' => 'Soth',
            'photo' => 'example/grocery/product/Lingette mini Soth.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 2500,
        ]);
        Product::factory()->create([
            'name' => 'Baboucha 250Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna baboucha 250Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 900,
        ]);
        Product::factory()->create([
            'name' => 'Cheveux d\'anges 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna cheveux d\'anges 500Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 500,
        ]);
        Product::factory()->create([
            'name' => 'Coudes 2 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna coudes 2 500gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 550,
        ]);
        Product::factory()->create([
            'name' => 'Fell 2 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna Fell 2 500Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 400,
        ]);
        Product::factory()->create([
            'name' => 'Lsen 3asfour 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna lsen 3asfour 500Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 450,
        ]);
        Product::factory()->create([
            'name' => 'Rossort 500Gr',
            'brand' => 'Randa',
            'photo' => 'example/grocery/product/Ma9arouna rossort 500Gr randa.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 500,
        ]);
        Product::factory()->create([
            'name' => 'Spaghetti 2 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna spaghetti 2 500gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 500,
        ]);
        Product::factory()->create([
            'name' => 'Sel 1K',
            'brand' => 'Le flamant',
            'photo' => 'example/grocery/product/Mel7 1K Le flamant.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => 'Prestine 1.5L',
            'brand' => 'Prestine',
            'photo' => 'example/grocery/product/Mi 1.5L Prestine.jpg',
            'category_id' => $categoryEauEtBoissongId,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => 'Safia 1.5L',
            'brand' => 'Safia',
            'photo' => 'example/grocery/product/Mi 1.5L Safia.jpg',
            'category_id' => $categoryEauEtBoissongId,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => '2 rouleaux',
            'brand' => 'Lilas',
            'photo' => 'example/grocery/product/Mouchoir 2 rouleau Lilas.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 2750,
        ]);
        Product::factory()->create([
            'name' => 'Mouchoir',
            'brand' => 'Lilas',
            'photo' => 'example/grocery/product/Mouchoire Lilas.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 200,
        ]);
        Product::factory()->create([
            'name' => 'Omo 500Gr',
            'brand' => 'Dex',
            'photo' => 'example/grocery/product/Omo 500gr Dex.jpg',
            'category_id' => $categoryMaisonId,
            'price' => 2200,
        ]);
        Product::factory()->create([
            'name' => 'Pate feuileté 500Gr',
            'brand' => 'Napolis',
            'photo' => 'example/grocery/product/Pate feuilleté 500gr Napolis.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 4600,
        ]);
        Product::factory()->create([
            'name' => 'Sablito Chocolat',
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Sablito Chocolat Said.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 1200,
        ]);
        Product::factory()->create([
            'name' => 'Salami',
            'brand' => 'Mazr3a',
            'photo' => 'example/grocery/product/Salami sghir 1 Mazr3a.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => 'Salami',
            'brand' => 'Mazr3a',
            'photo' => 'example/grocery/product/Salami sghir 2 Mazr3a.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => 'Serviette blanc',
            'brand' => 'Velour',
            'photo' => 'example/grocery/product/Serviette blanc Velour.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => 'Serviette bleu',
            'brand' => 'Lotus',
            'photo' => 'example/grocery/product/Serviette bleu Lotus.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => 'Serviette jaune',
            'brand' => 'Lotus',
            'photo' => 'example/grocery/product/Serviette jaune Lotus.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => 'Thon lot de 3',
            'brand' => 'El badr',
            'photo' => 'example/grocery/product/Thon El Badr lot 3.jpg',
            'category_id' => $categoryConservesId,
            'price' => 13500,
        ]);
        Product::factory()->create([
            'name' => 'Thon',
            'brand' => 'Matanza',
            'photo' => 'example/grocery/product/Thon Matanza.jpg',
            'category_id' => $categoryConservesId,
            'price' => 4200,
        ]);
        Product::factory()->create([
            'name' => 'Tmatem ma3joun 1K',
            'brand' => 'Le petit paris',
            'photo' => 'example/grocery/product/Tmatem ma3joun 1K Le petit paris.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 3700,
        ]);
        Product::factory()->create([
            'name' => 'Tmatem ma3joun 1K',
            'brand' => 'Sicam',
            'photo' => 'example/grocery/product/Tmatem ma3joun 1K Sicam.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 3500,
        ]);
        Product::factory()->create([
            'name' => 'Tmatem ma3joun 500gr',
            'brand' => '3bida',
            'photo' => 'example/grocery/product/Tmatem ma3joun 500gr 3bida.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 3300,
        ]);
        Product::factory()->create([
            'name' => 'Zebda 100gr',
            'brand' => 'Vitalait',
            'photo' => 'example/grocery/product/Zebda 100gr Vitalait.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 2050,
        ]);
        Product::factory()->create([
            'name' => 'Zebda 100gr',
            'brand' => 'Jadida',
            'photo' => 'example/grocery/product/Zebda 100gr Jadida.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => 'Zebda 200gr',
            'brand' => 'Jadida',
            'photo' => 'example/grocery/product/Zebda 200gr Jadida.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 2300,
        ]);
        Product::factory()->create([
            'name' => 'Zebda 500gr',
            'brand' => 'Jadida',
            'photo' => 'example/grocery/product/Zebda 500gr Jadida.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 3200,
        ]);
        Product::factory()->create([
            'name' => 'Zit 3L',
            'brand' => 'Nejma',
            'photo' => 'example/grocery/product/Zit 3L Nejma.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 14500,
        ]);

        if (env('APP_ENV') === 'local') {
            factory(\App\Models\Product::class, 500)->create([ 'category_id' => $testPaginationCategoryId ]);
        }
    }
}
