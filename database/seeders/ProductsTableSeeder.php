<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->productsForPlats();
        $this->productsForSandwich();
        $this->productsForPizza();
        $this->productsForPates();
        $this->productsForAperetif();
        $this->productsForBoisson();
        $this->productsForTestPagination();
    }

    /**
     *
     */
    public function productsForPlats()
    {
        $categoryPlatsId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Plats'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Escalope pané',
                'en' => 'Breaded escalope',
                'tn' => 'Escalope pané',
                'ar' => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/escalope_pane.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Escalope grillé',
                'en' => 'Grilled escalope',
                'tn' => 'Escalope grillé',
                'ar' => 'اسكالوب مشوي',
            ],
            'photo' => 'example/restaurant/product/escalope_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 8500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Escalope citron',
                'en' => 'Lemon escalope',
                'tn' => 'Escalope citron',
                'ar' => 'اسكالوب ليمون',
            ],
            'photo' => 'example/restaurant/product/escalope_citron.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 11000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Escalope sauce champignon',
                'en' => 'Escalope with mushroom sauce',
                'tn' => 'Escalope sauce champignon',
                'ar' => 'اسكالوب مع صوص الفطر',
            ],
            'photo' => 'example/restaurant/product/escalope_sauce_champignon.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 12500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Cordon bleu',
                'en' => 'Cordon bleu',
                'tn' => 'Cordon bleu',
                'ar' => 'كوردون بلو',
            ],
            'photo' => 'example/restaurant/product/plat_cordon_bleu.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Brochette viande',
                'en' => 'Meat skewer',
                'tn' => 'Brochette viande',
                'ar' => 'سيخ لحم',
            ],
            'photo' => 'example/restaurant/product/brochette_viande.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Brochette escalope',
                'en' => 'Escalope skewer',
                'tn' => 'Brochette escalope',
                'ar' => 'سيخ اسكالوب',
            ],
            'photo' => 'example/restaurant/product/brochette_escalope.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 11500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Viande grillé',
                'en' => 'Grilled meat',
                'tn' => 'Viande grillé',
                'ar' => 'لحم مشوي',
            ],
            'photo' => 'example/restaurant/product/viande_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Grillade mix',
                'en' => 'Mixed grill',
                'tn' => 'Grillade mix',
                'ar' => 'ميكس جريل',
            ],
            'photo' => 'example/restaurant/product/grillade_mix.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 18000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Paella',
                'en' => 'Paella',
                'tn' => 'Paella',
                'ar' => 'بايلا',
            ],
            'photo' => 'example/restaurant/product/paella.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_FIXED,
            'price' => 16000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Beignet crevette',
                'en' => 'Shrimp crackers',
                'tn' => 'Beignet crevette',
                'ar' => 'مقرمشات جمبري',
            ],
            'photo' => 'example/restaurant/product/beignet_crevette.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 17000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Calamar doré',
                'en' => 'Golden squid',
                'tn' => 'Calamar doré',
                'ar' => 'الحبار الذهبي',
            ],
            'photo' => 'example/restaurant/product/calamar_dore.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 18000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Symfonie fruit de mer',
                'en' => 'Seafood symphony',
                'tn' => 'Symfonie fruit de mer',
                'ar' => 'سيمفونية المأكولات البحرية',
            ],
            'photo' => 'example/restaurant/product/plat_fruit_mer.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 26000,
        ]);
    }

    /**
     *
     */
    public function productsForSandwich()
    {
        $categorySandwichId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sandwich'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich escalope',
                'en' => 'Escalope sandwich',
                'tn' => 'Sandwich escalope',
                'ar' => 'ساندوتش اسكالوب',
            ],
            'photo' => 'example/restaurant/product/sandwich_escalope.png',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich thon',
                'en' => 'Tuna sandwich',
                'tn' => 'Sandwich thon',
                'ar' => 'ساندوتش تن',
            ],
            'photo' => 'example/restaurant/product/sandwich_thon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 5500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich jambon',
                'en' => 'Ham sandwich',
                'tn' => 'Sandwich jambon',
                'ar' => 'ساندويش جمبون',
            ],
            'photo' => 'example/restaurant/product/sandwich_jambon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 5500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich nugget',
                'en' => 'Nugget sandwich',
                'tn' => 'Escalope nugget',
                'ar' => 'شطيرة ناجت',
            ],
            'photo' => 'example/restaurant/product/sandwich_nugget.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich brochette',
                'en' => 'Skewer sandwich',
                'tn' => 'Escalope brochette',
                'ar' => 'ساندوتش سيخ',
            ],
            'photo' => 'example/restaurant/product/sandwich_brochette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 6500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich crevette',
                'en' => 'Shrimp sandwich',
                'tn' => 'Sandwich crevette',
                'ar' => 'ساندوتش جمبري',
            ],
            'photo' => 'example/restaurant/product/sandwich_crevette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 7500,
        ]);
    }

    /**
     *
     */
    public function productsForPizza()
    {
        $pizzaId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza margherita',
                'en' => 'Margherita Pizza',
                'tn' => 'Pizza margherita',
                'ar' => 'بيتزا مارغريتا',
            ],
            'photo' => 'example/restaurant/product/pizza_margeritha.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 8000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza thon',
                'en' => 'Tuna Pizza',
                'tn' => 'Pizza thon',
                'ar' => 'بيتزا تن',
            ],
            'photo' => 'example/restaurant/product/pizza_thon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza fruit de mer',
                'en' => 'Seafood pizza',
                'tn' => 'Pizza fruit de mer',
                'ar' => 'بيتزا المأكولات البحرية',
            ],
            'photo' => 'example/restaurant/product/pizza_fruit_mer.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 14500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza chicken',
                'en' => 'Chicken pizza',
                'tn' => 'Pizza chicken',
                'ar' => 'بيتزا دجاج',
            ],
            'photo' => 'example/restaurant/product/pizza_chicken.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza 4 fromages',
                'en' => '4 cheese pizza',
                'tn' => 'Pizza 4 fromages',
                'ar' => 'بيتزا 4 أجبان',
            ],
            'photo' => 'example/restaurant/product/pizza_4fromage.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza pepperoni',
                'en' => 'Pepperoni pizza',
                'tn' => 'Pizza pepperoni',
                'ar' => 'بيتزا بيبروني',
            ],
            'photo' => 'example/restaurant/product/pizza_pepperoni.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 9500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza regina',
                'en' => 'Regina pizza',
                'tn' => 'Pizza regina',
                'ar' => 'بيتزا ريجينا',
            ],
            'photo' => 'example/restaurant/product/pizza_regina.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 10500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza 4 gouts',
                'en' => '4 tastes pizza',
                'tn' => 'Pizza 4 gouts',
                'ar' => 'بيتزا 4 أذواق',
            ],
            'photo' => 'example/restaurant/product/pizza_4gout.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza indienne',
                'en' => 'Indian pizza',
                'tn' => 'Pizza indienne',
                'ar' => 'بيتزا هندية',
            ],
            'photo' => 'example/restaurant/product/pizza_indienne.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'price' => 12000,
        ]);
    }

    /**
     *
     */
    public function productsForPates()
    {
        $patesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pâtes'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Lasagne fruit mer',
                'en' => 'Seafood lasagna',
                'tn' => 'Lasagne fruit mer',
                'ar' => 'لازانيا المأكولات بحرية',
            ],
            'photo' => 'example/restaurant/product/lasagne_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 12500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Lasagne viande haché',
                'en' => 'Minced meat lasagna',
                'tn' => 'Lasagne viande haché',
                'ar' => 'لازانيا باللحم المفروم',
            ],
            'photo' => 'example/restaurant/product/lasagne_viande_hache.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 8500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Tagliatelle fruit de mer',
                'en' => 'Seafood tagliatelle',
                'tn' => 'Tagliatelle fruit de mer',
                'ar' => 'تالياتيلي المأكولات البحرية',
            ],
            'photo' => 'example/restaurant/product/tagliatelle_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Tagliatelles saumon',
                'en' => 'Salmon tagliatelle',
                'tn' => 'Tagliatelles saumon',
                'ar' => 'تالياتيلي السلمون',
            ],
            'photo' => 'example/restaurant/product/tagliatelles_saumon.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Spaghetti bolognaise',
                'en' => 'Spaghetti Bolognese',
                'tn' => 'Spaghetti bolognaise',
                'ar' => 'سباجيتي بولونية',
            ],
            'photo' => 'example/restaurant/product/spaghetti_bolognaise.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Spaghetti fruit de mer',
                'en' => 'Seafood spaghetti',
                'tn' => 'Spaghetti fruit de mer',
                'ar' => 'سباجيتي المأكولات البحرية',
            ],
            'photo' => 'example/restaurant/product/spaghetti_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Spaghetti fruit de mer sauce blanche',
                'en' => 'Seafood spaghetti with white sauce',
                'tn' => 'Spaghetti fruit de mer sauce blanche',
                'ar' => 'سباجيتي المأكولات البحرية مع الصلصة البيضاء',
            ],
            'photo' => 'example/restaurant/product/spaghetti_fruit_mer_sauce_blanche.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Spaghetti saumon fumé',
                'en' => 'Smoked salmon spaghetti',
                'tn' => 'Spaghetti saumon fumé',
                'ar' => 'سباجيتي السلمون المدخن',
            ],
            'photo' => 'example/restaurant/product/spaghetti_saumon_fume.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Penne saumon',
                'en' => 'Salmon penne',
                'tn' => 'Penne saumon',
                'ar' => 'سلمون بيني',
            ],
            'photo' => 'example/restaurant/product/penne_saumon.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'price' => 13000,
        ]);
    }

    /**
     *
     */
    public function productsForAperetif()
    {
        $entreeId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Entrées'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Corn dog',
                'en' => 'Corn dog',
                'tn' => 'Corn dog',
                'ar' => 'كورن دوج',
            ],
            'photo' => 'example/restaurant/product/corn_dog.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 7000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Nuggets',
                'en' => 'Nuggets',
                'tn' => 'Nuggets',
                'ar' => 'ناجت',
            ],
            'photo' => 'example/restaurant/product/nugget.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Bric',
                'en' => 'Bric',
                'tn' => 'Bric',
                'ar' => 'بريك',
            ],
            'photo' => 'example/restaurant/product/bric_finger.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 1500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Frites',
                'en' => 'French fries',
                'tn' => 'Frites',
                'ar' => 'البطاطس المقلية',
            ],
            'photo' => 'example/restaurant/product/frites_parsley.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'price' => 1500,
        ]);
    }

    /**
     *
     */
    public function productsForBoisson()
    {
        $boissonId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Boissons'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Safia 50ml',
                'en' => 'Safia 50ml',
                'tn' => 'Safia 50ml',
                'ar' => 'صافية 50 مل',
            ],
            'photo' => 'example/restaurant/product/safia.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 600,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Coca cola',
                'en' => 'Coca cola',
                'tn' => 'Coca cola',
                'ar' => 'كوكا كولا',
            ],
            'photo' => 'example/restaurant/product/coca.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Fanta',
                'en' => 'Fanta',
                'tn' => 'Fanta',
                'ar' => 'فانتا',
            ],
            'photo' => 'example/restaurant/product/fanta.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Boga Lime',
                'en' => 'Boga Lime',
                'tn' => 'Boga Lime',
                'ar' => 'بوقا ليمون',
            ],
            'photo' => 'example/restaurant/product/boga_lim.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Boga cidre',
                'en' => 'Boga cidre',
                'tn' => 'Boga cidre',
                'ar' => 'بوغا سيدر',
            ],
            'photo' => 'example/restaurant/product/boga_cidre.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Apla',
                'en' => 'Apla',
                'tn' => 'Apla',
                'ar' => 'أبلا',
            ],
            'photo' => 'example/restaurant/product/apla.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Orangina',
                'en' => 'Orangina',
                'tn' => 'Orangina',
                'ar' => 'أورانجينا',
            ],
            'photo' => 'example/restaurant/product/orangina.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'price' => 1500,
        ]);
    }

    /**
     *
     */
    public function productsForTestPagination()
    {
        if (env('APP_ENV') !== 'local') {
            return;
        }

        $testPaginationCategoryId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Test_pagination_category'")->first()->id;
        Product::factory()->count(500)->create([ 'category_id' => $testPaginationCategoryId ]);
    }
}
