<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $categories = \App\Model\Category::all();
        $categoryEauEtBoissongId = $categories->where('name', '=', 'Eau et Boissons')->first()->id;

        $categoryConservesId = $categories->where('name', '=', 'Conserves')->first()->id;
        $categoryPatesRiZChorbaId = $categories->where('name', '=', 'Pates, riz semoule, chorba')->first()->id;
        $categoryBoulangerieId = $categories->where('name', '=', 'Boulangerie')->first()->id;
        $categorySurgeleId = $categories->where('name', '=', 'Surgelé')->first()->id;
        $categoryMaisonId = $categories->where('name', '=', 'Maison')->first()->id;
        $categoryHygieneId = $categories->where('name', '=', 'Hygiéne')->first()->id;
        $categoryPetitDejId = $categories->where('name', '=', 'Petit déjeuner')->first()->id;
        $categorySucrerieId = $categories->where('name', '=', 'Sucrerie et chocolat')->first()->id;


        factory(\App\Model\Product::class)->create([
            'name' => '5mira',
            'brand' => 'La patisiere',
            'photo' => 'example/product/5mira La patisiere.jpg',
            'category_id' => $categoryBoulangerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => '5mira',
            'brand' => 'Venoise',
            'photo' => 'example/product/5mira Venoise.jpg',
            'category_id' => $categoryBoulangerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => '7lib 1L',
            'brand' => 'Vitalé',
            'photo' => 'example/product/7lib 1L Vitalé',
            'category_id' => $categoryBoulangerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Chocolat tartiné noisette 1K',
            'brand' => 'Said',
            'photo' => 'example/product/Chocolat tartiné noisette 1K Said.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Chocolat tartiné noisette 200Gr',
            'brand' => 'Said',
            'photo' => 'example/product/Chocolat tartiné noisette 200gr Said.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Chocolat tartiné 1K',
            'brand' => 'Said',
            'photo' => 'example/product/Chocolat tartiné 1K Said.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Chocolat tartiné noisette 150Gr',
            'brand' => 'Venoise',
            'photo' => 'example/product/Chocolat tartiné noisette 150 Venoise.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Cookies chocolat',
            'brand' => 'St Michel',
            'photo' => 'example/product/Cookies chocolat St Michel.jpg',
            'category_id' => $categorySucrerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Créme fraiche',
            'brand' => 'Vitalait',
            'photo' => 'example/product/Créme fraiche Vitalait.jpg',
            'category_id' => $categorySucrerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Danette chocolat',
            'brand' => 'Délice',
            'photo' => 'example/product/Danette chocolat Délice.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Farine',
            'brand' => 'Les épis de carthage',
            'photo' => 'example/product/Farine Les épis de carthage.jpg',
            'category_id' => $categoryBoulangerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Fitox',
            'brand' => 'Choc',
            'photo' => 'example/product/Fitox Choc.jpg',
            'category_id' => $categoryMaisonId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Fromage Emmental',
            'brand' => 'Président',
            'photo' => 'example/product/Fromage Emmental Président.jpg',
            'category_id' => $categoryBoulangerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Fromage le cuistot',
            'brand' => 'Président',
            'photo' => 'example/product/Fromage le cuistot Président.jpg',
            'category_id' => $categoryBoulangerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'D-Croc',
            'brand' => 'Kif',
            'photo' => 'example/product/Gaufrette D-Croc Kif.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Hrissa',
            'brand' => 'Le petit paris',
            'photo' => 'example/product/Hrissa Le petit paris.jpg',
            'category_id' => $categoryConservesId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Javel 1.5L',
            'brand' => 'Lilas',
            'photo' => 'example/product/Javel 1.5L Lilas.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Javel 4.5L',
            'brand' => 'Judy',
            'photo' => 'example/product/Javel 4.5L Judy.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Javel 4.75L',
            'brand' => 'Judy',
            'photo' => 'example/product/Javel 4.75L Judy.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Lait 1L',
            'brand' => 'Délice',
            'photo' => 'example/product/Lait 1L Délice.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Lingette mini',
            'brand' => 'Soth',
            'photo' => 'example/product/Lingette mini Soth.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Baboucha 250Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/product/Ma9arouna baboucha 250Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Cheveux d\'anges 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/product/Ma9arouna cheveux d\'anges 500Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Coudes 2 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/product/Ma9arouna coudes 2 500gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Fell 2 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/product/Ma9arouna Fell 2 500Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Lsen 3asfour 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/product/Ma9arouna lsen 3asfour 500Gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Rossort 500Gr',
            'brand' => 'Randa',
            'photo' => 'example/product/Ma9arouna rossort 500Gr randa.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Spaghetti 2 500Gr',
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/product/Ma9arouna spaghetti 2 500gr L\'épi d\'or.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Prestine 1.5L',
            'brand' => 'Prestine',
            'photo' => 'example/product/Mi 1.5L Prestine.jpg',
            'category_id' => $categoryEauEtBoissongId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Safia 1.5L',
            'brand' => 'Safia',
            'photo' => 'example/product/Mi 1.5L Safia.jpg',
            'category_id' => $categoryEauEtBoissongId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => '2 rouleaux',
            'brand' => 'Lilas',
            'photo' => 'example/product/Mouchoir 2 rouleau Lilas.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Mouchoir',
            'brand' => 'Lilas',
            'photo' => 'example/product/Mouchoire Lilas.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Omo 500Gr',
            'brand' => 'Dex',
            'photo' => 'example/product/Omo 500gr Dex.jpg',
            'category_id' => $categoryMaisonId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Pate feuileté 500Gr',
            'brand' => 'Napolis',
            'photo' => 'example/product/Pate feuilleté 500gr Napolis.jpg',
            'category_id' => $categoryBoulangerieId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Sablito Chocolat',
            'brand' => 'Said',
            'photo' => 'example/product/Sablito Chocolat Said.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Salami',
            'brand' => 'Mazr3a',
            'photo' => 'example/product/Salami sghir 1 Mazr3a.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Salami',
            'brand' => 'Mazr3a',
            'photo' => 'example/product/Salami sghir 2 Mazr3a.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Serviette blanc',
            'brand' => 'Velour',
            'photo' => 'example/product/Serviette blanc Velour.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Serviette bleu',
            'brand' => 'Lotus',
            'photo' => 'example/product/Serviette bleu Lotus.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Serviette jaune',
            'brand' => 'Lotus',
            'photo' => 'example/product/Serviette jaune Lotus.jpg',
            'category_id' => $categoryHygieneId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Thon lot de 3',
            'brand' => 'El badr',
            'photo' => 'example/product/Thon El Badr lot 3.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Thon',
            'brand' => 'Matanza',
            'photo' => 'example/product/Thon Matanza.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Tmatem ma3joun 1K',
            'brand' => 'Le petit paris',
            'photo' => 'example/product/Tmatem ma3joun 1K Le petit paris.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Tmatem ma3joun 1K',
            'brand' => 'Sicam',
            'photo' => 'example/product/Tmatem ma3joun 1K Sicam.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Tmatem ma3joun 500gr',
            'brand' => '3bida',
            'photo' => 'example/product/Tmatem ma3joun 500gr 3bida.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Zebda 25gr',
            'brand' => 'Vitalait',
            'photo' => 'example/product/Zebda 25gr Vitalait.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Zebda 100gr',
            'brand' => 'Jadida',
            'photo' => 'example/product/Zebda 100gr Jadida.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Zebda 200gr',
            'brand' => 'Jadida',
            'photo' => 'example/product/Zebda 200gr Jadida.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Zebda 500gr',
            'brand' => 'Jadida',
            'photo' => 'example/product/Zebda 500gr Jadida.jpg',
            'category_id' => $categoryPetitDejId,
        ]);
        factory(\App\Model\Product::class)->create([
            'name' => 'Zit 3L',
            'brand' => 'Nejma',
            'photo' => 'example/product/Zit 3L Nejma.jpg',
            'category_id' => $categoryMaisonId, // TODO: find better category
        ]);
    }
}