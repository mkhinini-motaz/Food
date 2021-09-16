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
// TODO: every category's product in a seperate function
// TODO: order on products

        $categoryEauEtBoissongId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Eau et Boissons'")->first()->id;

        $categoryConservesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Conserves'")->first()->id;
        $categoryPatesRiZChorbaId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pates, riz semoule, chorba'")->first()->id;
        $categoryBoulangerieId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Boulangerie'")->first()->id;
        $categorySurgeleId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Surgelé'")->first()->id;
        $categoryMaisonId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Maison'")->first()->id;
        $categoryHygieneId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Hygiéne'")->first()->id;
        $categoryPetitDejId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Petit déjeuner'")->first()->id;
        $categorySucrerieId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sucrerie et chocolat'")->first()->id;


        Product::factory()->create([
            'name' => [
                'fr'   => '5mira',
                'en'   => '5mira',
                'tnfr' => '5mira',
                'tnar' => '5mira',
                'ar'   => '5mira',
            ],
            'brand' => 'La patisiere',
            'photo' => 'example/grocery/product/5mira_La_patisiere.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => '5mira 5 piéces',
                'en'   => '5mira 5 piéces',
                'tnfr' => '5mira 5 piéces',
                'tnar' => '5mira 5 piéces',
                'ar'   => '5mira 5 piéces',
            ],
            'brand' => 'Venoise',
            'photo' => 'example/grocery/product/5mira_Venoise.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Lait 1L',
                'en'   => 'Mil 1L',
                'tnfr' => '7lib 1L',
                'tnar' => '7lib 1L',
                'ar'   => '7lib 1L',
            ],
            'brand' => 'Vitalé',
            'photo' => 'example/grocery/product/7lib_1L_Vitale.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 1200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Chocolat tartiné noisette 1K',
                'en'   => 'Chocolat tartiné noisette 1K',
                'tnfr' => 'Chocolat tartiné noisette 1K',
                'tnar' => 'Chocolat tartiné noisette 1K',
                'ar'   => 'Chocolat tartiné noisette 1K',
            ],
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Chocolat_tartine_noisette_1K_Said.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 9500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Chocolat tartiné noisette 500Gr',
                'en'   => 'Chocolat tartiné noisette 500Gr',
                'tnfr' => 'Chocolat tartiné noisette 500Gr',
                'tnar' => 'Chocolat tartiné noisette 500Gr',
                'ar'   => 'Chocolat tartiné noisette 500Gr',
            ],
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Chocolat_tartine_noisette_500gr_Said.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 5500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Chocolat tartiné 1K',
                'en'   => 'Chocolat tartiné 1K',
                'tnfr' => 'Chocolat tartiné 1K',
                'tnar' => 'Chocolat tartiné 1K',
                'ar'   => 'Chocolat tartiné 1K',
            ],
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Chocolat_tartine_1K_Said.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 8000,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Chocolat tartiné 150Gr',
                'en'   => 'Chocolat tartiné 150Gr',
                'tnfr' => 'Chocolat tartiné 150Gr',
                'tnar' => 'Chocolat tartiné 150Gr',
                'ar'   => 'Chocolat tartiné 150Gr',
            ],
            'brand' => 'Vanoise',
            'photo' => 'example/grocery/product/Chocolat_tartine_150gr_Vanoise.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 3200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Cookies chocolat',
                'en'   => 'Cookies chocolat',
                'tnfr' => 'Cookies chocolat',
                'tnar' => 'Cookies chocolat',
                'ar'   => 'Cookies chocolat',
            ],
            'brand' => 'St Michel',
            'photo' => 'example/grocery/product/Cookies_chocolat_St_Michel.jpg',
            'category_id' => $categorySucrerieId,
            'price' => 1250,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Créme fraiche',
                'en'   => 'Créme fraiche',
                'tnfr' => 'Créme fraiche',
                'tnar' => 'Créme fraiche',
                'ar'   => 'Créme fraiche',
            ],
            'brand' => 'Vitalait',
            'photo' => 'example/grocery/product/Creme_fraiche_Vitalait.jpg',
            'category_id' => $categorySucrerieId,
            'price' => 3250,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Sablito Chocolat',
                'en'   => 'Sablito Chocolat',
                'tnfr' => 'Sablito Chocolat',
                'tnar' => 'Sablito Chocolat',
                'ar'   => 'Sablito Chocolat',
            ],
            'brand' => 'Said',
            'photo' => 'example/grocery/product/Sablito_Chocolat_Said.jpg',
            'category_id' => $categorySucrerieId,
            'price' => 1200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Danette chocolat',
                'en'   => 'Danette chocolat',
                'tnfr' => 'Danette chocolat',
                'tnar' => 'Danette chocolat',
                'ar'   => 'Danette chocolat',
            ],
            'brand' => 'Délice',
            'photo' => 'example/grocery/product/Danette_chocolat_Delice.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Farine',
                'en'   => 'Farine',
                'tnfr' => 'Farine',
                'tnar' => 'Farine',
                'ar'   => 'Farine',
            ],
            'brand' => 'Les épis de carthage',
            'photo' => 'example/grocery/product/Farine_Les_epis_de_carthage.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 800,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Fitox',
                'en'   => 'Fitox',
                'tnfr' => 'Fitox',
                'tnar' => 'Fitox',
                'ar'   => 'Fitox',
            ],
            'brand' => 'Choc',
            'photo' => 'example/grocery/product/Fitox_Choc.jpg',
            'category_id' => $categoryMaisonId,
            'price' => 4500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Fromage Emmental 100Gr',
                'en'   => 'Fromage Emmental 100Gr',
                'tnfr' => 'Fromage Emmental 100Gr',
                'tnar' => 'Fromage Emmental 100Gr',
                'ar'   => 'Fromage Emmental 100Gr',
            ],
            'brand' => 'Président',
            'photo' => 'example/grocery/product/Fromage_Emmental_100Gr_President.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 3650,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Fromage le cuistot 150Gr',
                'en'   => 'Fromage le cuistot 150Gr',
                'tnfr' => 'Fromage le cuistot 150Gr',
                'tnar' => 'Fromage le cuistot 150Gr',
                'ar'   => 'Fromage le cuistot 150Gr',
            ],
            'brand' => 'Président',
            'photo' => 'example/grocery/product/Fromage_le_cuistot_150Gr_President.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 2250,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'D-Croc Tiramesu 110Gr',
                'en'   => 'D-Croc Tiramesu 110Gr',
                'tnfr' => 'D-Croc Tiramesu 110Gr',
                'tnar' => 'D-Croc Tiramesu 110Gr',
                'ar'   => 'D-Croc Tiramesu 110Gr',
            ],
            'brand' => 'Kif',
            'photo' => 'example/grocery/product/Gaufrette_D-Croc_Tiramesu_110Gr_Kif.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 1300,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Hrissa 400Gr',
                'en'   => 'Hrissa 400Gr',
                'tnfr' => 'Hrissa 400Gr',
                'tnar' => 'Hrissa 400Gr',
                'ar'   => 'Hrissa 400Gr',
            ],
            'brand' => 'Le petit paris',
            'photo' => 'example/grocery/product/Hrissa_400Gr_Le_petit_paris.jpg',
            'category_id' => $categoryConservesId,
            'price' => 1800,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Javel 1.5L',
                'en'   => 'Javel 1.5L',
                'tnfr' => 'Javel 1.5L',
                'tnar' => 'Javel 1.5L',
                'ar'   => 'Javel 1.5L',
            ],
            'brand' => 'Lilas',
            'photo' => 'example/grocery/product/Javel_1.5L_Lilas.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 3000,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Javel 4.5L',
                'en'   => 'Javel 4.5L',
                'tnfr' => 'Javel 4.5L',
                'tnar' => 'Javel 4.5L',
                'ar'   => 'Javel 4.5L',
            ],
            'brand' => 'Judy',
            'photo' => 'example/grocery/product/Javel_4.5L_Judy.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 8000,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Javel 4.75L',
                'en'   => 'Javel 4.75L',
                'tnfr' => 'Javel 4.75L',
                'tnar' => 'Javel 4.75L',
                'ar'   => 'Javel 4.75L',
            ],
            'brand' => 'Judy',
            'photo' => 'example/grocery/product/Javel_4.75L_Judy.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 10000,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Lait 1L',
                'en'   => 'Lait 1L',
                'tnfr' => 'Lait 1L',
                'tnar' => 'Lait 1L',
                'ar'   => 'Lait 1L',
            ],
            'brand' => 'Délice',
            'photo' => 'example/grocery/product/Lait_1L_Delice.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 1350,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Lingette mini',
                'en'   => 'Lingette mini',
                'tnfr' => 'Lingette mini',
                'tnar' => 'Lingette mini',
                'ar'   => 'Lingette mini',
            ],
            'brand' => 'Soth',
            'photo' => 'example/grocery/product/Lingette_mini_Soth.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 2500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Baboucha 250Gr',
                'en'   => 'Baboucha 250Gr',
                'tnfr' => 'Baboucha 250Gr',
                'tnar' => 'Baboucha 250Gr',
                'ar'   => 'Baboucha 250Gr',
            ],
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna_baboucha_250Gr_Lepi_dor.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 900,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Cheveux d\'anges 500Gr',
                'en'   => 'Cheveux d\'anges 500Gr',
                'tnfr' => 'Cheveux d\'anges 500Gr',
                'tnar' => 'Cheveux d\'anges 500Gr',
                'ar'   => 'Cheveux d\'anges 500Gr',
            ],
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna_cheveux_danges_500Gr_Lepi_dor.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Coudes 2 500Gr',
                'en'   => 'Coudes 2 500Gr',
                'tnfr' => 'Coudes 2 500Gr',
                'tnar' => 'Coudes 2 500Gr',
                'ar'   => 'Coudes 2 500Gr',
            ],
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna_coudes_2_500gr_Lepi_dor.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 550,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Fell 2 500Gr',
                'en'   => 'Fell 2 500Gr',
                'tnfr' => 'Fell 2 500Gr',
                'tnar' => 'Fell 2 500Gr',
                'ar'   => 'Fell 2 500Gr',
            ],
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna_Fell_2_500Gr_Lepi_dor.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 400,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Lsen 3asfour 500Gr',
                'en'   => 'Lsen 3asfour 500Gr',
                'tnfr' => 'Lsen 3asfour 500Gr',
                'tnar' => 'Lsen 3asfour 500Gr',
                'ar'   => 'Lsen 3asfour 500Gr',
            ],
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna_lsen_3asfour_500Gr_Lepi_dor.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 450,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Rossort 500Gr',
                'en'   => 'Rossort 500Gr',
                'tnfr' => 'Rossort 500Gr',
                'tnar' => 'Rossort 500Gr',
                'ar'   => 'Rossort 500Gr',
            ],
            'brand' => 'Randa',
            'photo' => 'example/grocery/product/Ma9arouna_rossort_500Gr_randa.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Spaghetti 2 500Gr',
                'en'   => 'Spaghetti 2 500Gr',
                'tnfr' => 'Spaghetti 2 500Gr',
                'tnar' => 'Spaghetti 2 500Gr',
                'ar'   => 'Spaghetti 2 500Gr',
            ],
            'brand' => 'L\'épi d\'or',
            'photo' => 'example/grocery/product/Ma9arouna_spaghetti_2_500gr_Lepi_dor.jpg',
            'category_id' => $categoryPatesRiZChorbaId,
            'price' => 500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Sel 1K',
                'en'   => 'Sel 1K',
                'tnfr' => 'Sel 1K',
                'tnar' => 'Sel 1K',
                'ar'   => 'Sel 1K',
            ],
            'brand' => 'Le flamant',
            'photo' => 'example/grocery/product/Mel7_1K_Le_flamant.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Prestine 1.5L',
                'en'   => 'Prestine 1.5L',
                'tnfr' => 'Prestine 1.5L',
                'tnar' => 'Prestine 1.5L',
                'ar'   => 'Prestine 1.5L',
            ],
            'brand' => 'Prestine',
            'photo' => 'example/grocery/product/Mi_1.5L_Prestine.jpg',
            'category_id' => $categoryEauEtBoissongId,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Safia 1.5L',
                'en'   => 'Safia 1.5L',
                'tnfr' => 'Safia 1.5L',
                'tnar' => 'Safia 1.5L',
                'ar'   => 'Safia 1.5L',
            ],
            'brand' => 'Safia',
            'photo' => 'example/grocery/product/Mi_1.5L_Safia.jpg',
            'category_id' => $categoryEauEtBoissongId,
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => '2 rouleaux',
                'en'   => '2 rouleaux',
                'tnfr' => '2 rouleaux',
                'tnar' => '2 rouleaux',
                'ar'   => '2 rouleaux',
            ],
            'brand' => 'Lilas',
            'photo' => 'example/grocery/product/Mouchoir_2_rouleau_Lilas.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 2750,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Mouchoir',
                'en'   => 'Mouchoir',
                'tnfr' => 'Mouchoir',
                'tnar' => 'Mouchoir',
                'ar'   => 'Mouchoir',
            ],
            'brand' => 'Lilas',
            'photo' => 'example/grocery/product/Mouchoire_Lilas.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Omo 500Gr',
                'en'   => 'Omo 500Gr',
                'tnfr' => 'Omo 500Gr',
                'tnar' => 'Omo 500Gr',
                'ar'   => 'Omo 500Gr',
            ],
            'brand' => 'Dex',
            'photo' => 'example/grocery/product/Omo_500gr_Dex.jpg',
            'category_id' => $categoryMaisonId,
            'price' => 2200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Pate feuileté 500Gr',
                'en'   => 'Pate feuileté 500Gr',
                'tnfr' => 'Pate feuileté 500Gr',
                'tnar' => 'Pate feuileté 500Gr',
                'ar'   => 'Pate feuileté 500Gr',
            ],
            'brand' => 'Napolis',
            'photo' => 'example/grocery/product/Pate_feuillete_500gr_Napolis.jpg',
            'category_id' => $categoryBoulangerieId,
            'price' => 4600,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Salami',
                'en'   => 'Salami',
                'tnfr' => 'Salami',
                'tnar' => 'Salami',
                'ar'   => 'Salami',
            ],
            'brand' => 'Mazr3a',
            'photo' => 'example/grocery/product/Salami_sghir_1_Mazr3a.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Salami',
                'en'   => 'Salami',
                'tnfr' => 'Salami',
                'tnar' => 'Salami',
                'ar'   => 'Salami',
            ],
            'brand' => 'Mazr3a',
            'photo' => 'example/grocery/product/Salami_sghir_2_Mazr3a.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 600,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Serviette blanc',
                'en'   => 'Serviette blanc',
                'tnfr' => 'Serviette blanc',
                'tnar' => 'Serviette blanc',
                'ar'   => 'Serviette blanc',
            ],
            'brand' => 'Velour',
            'photo' => 'example/grocery/product/Serviette_blanc_Velour.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Serviette bleu',
                'en'   => 'Serviette bleu',
                'tnfr' => 'Serviette bleu',
                'tnar' => 'Serviette bleu',
                'ar'   => 'Serviette bleu',
            ],
            'brand' => 'Lotus',
            'photo' => 'example/grocery/product/Serviette_bleu_Lotus.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Serviette jaune',
                'en'   => 'Serviette jaune',
                'tnfr' => 'Serviette jaune',
                'tnar' => 'Serviette jaune',
                'ar'   => 'Serviette jaune',
            ],
            'brand' => 'Lotus',
            'photo' => 'example/grocery/product/Serviette_jaune_Lotus.jpg',
            'category_id' => $categoryHygieneId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Thon lot de 3',
                'en'   => 'Thon lot de 3',
                'tnfr' => 'Thon lot de 3',
                'tnar' => 'Thon lot de 3',
                'ar'   => 'Thon lot de 3',
            ],
            'brand' => 'El badr',
            'photo' => 'example/grocery/product/Thon_El_Badr_lot_3.jpg',
            'category_id' => $categoryConservesId,
            'price' => 13500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Thon',
                'tnfr' => 'Thon',
                'tnar' => 'Thon',
                'ar'   => 'Thon',
            ],
            'brand' => 'Matanza',
            'photo' => 'example/grocery/product/Thon_Matanza.jpg',
            'category_id' => $categoryConservesId,
            'price' => 4200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Tmatem ma3joun 1K',
                'en'   => 'Tmatem ma3joun 1K',
                'tnfr' => 'Tmatem ma3joun 1K',
                'tnar' => 'Tmatem ma3joun 1K',
                'ar'   => 'Tmatem ma3joun 1K',
            ],
            'brand' => 'Le petit paris',
            'photo' => 'example/grocery/product/Tmatem_ma3joun_1K_Le_petit_paris.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 3700,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Tmatem ma3joun 1K',
                'en'   => 'Tmatem ma3joun 1K',
                'tnfr' => 'Tmatem ma3joun 1K',
                'tnar' => 'Tmatem ma3joun 1K',
                'ar'   => 'Tmatem ma3joun 1K',
            ],
            'brand' => 'Sicam',
            'photo' => 'example/grocery/product/Tmatem_ma3joun_1K_Sicam.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 3500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Tmatem ma3joun 500gr',
                'en'   => 'Tmatem ma3joun 500gr',
                'tnfr' => 'Tmatem ma3joun 500gr',
                'tnar' => 'Tmatem ma3joun 500gr',
                'ar'   => 'Tmatem ma3joun 500gr',
            ],
            'brand' => '3bida',
            'photo' => 'example/grocery/product/Tmatem_ma3joun_500gr_3bida.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 3300,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Zebda 100gr',
                'en'   => 'Zebda 100gr',
                'tnfr' => 'Zebda 100gr',
                'tnar' => 'Zebda 100gr',
                'ar'   => 'Zebda 100gr',
            ],
            'brand' => 'Vitalait',
            'photo' => 'example/grocery/product/Zebda_100gr_Vitalait.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 2050,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Zebda 100gr',
                'en'   => 'Zebda 100gr',
                'tnfr' => 'Zebda 100gr',
                'tnar' => 'Zebda 100gr',
                'ar'   => 'Zebda 100gr',
            ],
            'brand' => 'Jadida',
            'photo' => 'example/grocery/product/Zebda_100gr_Jadida.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 1500,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Zebda 200gr',
                'en'   => 'Zebda 200gr',
                'tnfr' => 'Zebda 200gr',
                'tnar' => 'Zebda 200gr',
                'ar'   => 'Zebda 200gr',
            ],
            'brand' => 'Jadida',
            'photo' => 'example/grocery/product/Zebda_200gr_Jadida.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 2300,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Zebda 500gr',
                'en'   => 'Zebda 500gr',
                'tnfr' => 'Zebda 500gr',
                'tnar' => 'Zebda 500gr',
                'ar'   => 'Zebda 500gr',
            ],
            'brand' => 'Jadida',
            'photo' => 'example/grocery/product/Zebda_500gr_Jadida.jpg',
            'category_id' => $categoryPetitDejId,
            'price' => 3200,
        ]);
        Product::factory()->create([
            'name' => [
                'fr'   => 'Zit 3L',
                'en'   => 'Zit 3L',
                'tnfr' => 'Zit 3L',
                'tnar' => 'Zit 3L',
                'ar'   => 'Zit 3L',
            ],
            'brand' => 'Nejma',
            'photo' => 'example/grocery/product/Zit_3L_Nejma.jpg',
            'category_id' => $categoryPatesRiZChorbaId, // TODO: find better category
            'price' => 14500,
        ]);
    }
}
