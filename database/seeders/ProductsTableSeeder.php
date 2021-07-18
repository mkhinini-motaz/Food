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
        $this->productsForTacos();
        $this->productsForSandwich();
        $this->productsForMakloub();
        $this->productsForPizza();
        $this->productsForPizzaSauceBlanche();
        $this->productsForBaguetteFarcie();
        $this->productsForPates();
        $this->productsForAperetif();
        $this->productsForBoisson();
        $this->productsForTestPagination();
    }

    /**
     *
     */
    public function productsForTacos()
    {
        $categoryTacosId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Tacos S 1 viande',
                'en' => 'French tacos S 1 meat',
                'tn' => 'Tacos S 1 viande',
                'ar' => 'تاكوس إس لحمة واحدة',
            ],
            'photo' => 'example/restaurant/product/tacos_s.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 1,
            'added_loyalty_points' => 2,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Tacos M 2 viandes',
                'en' => 'French tacos M 2 meats',
                'tn' => 'Tacos M 2 viandes',
                'ar' => 'تاكوس إم لحمتان',
            ],
            'photo' => 'example/restaurant/product/tacos_m.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 2,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Tacos L 3 viandes',
                'en' => 'French tacos L 3 meats',
                'tn' => 'Tacos L 3 viandes',
                'ar' => 'تاكوس إل ثلاث لحوم',
            ],
            'photo' => 'example/restaurant/product/tacos_l.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 3,
            'added_loyalty_points' => 5,
        ]);
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 1,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 2,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 3,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 4,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 5,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 6,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 7,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 8,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 9,
            'added_loyalty_points' => 0,
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
            'is_visible' => 0,
            'order' => 10,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 11,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 12,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'is_visible' => 0,
            'order' => 13,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 1,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 2,
            'added_loyalty_points' => 0,
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 3,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich nugget',
                'en' => 'Nugget sandwich',
                'tn' => 'Sandwich nugget',
                'ar' => 'ساندوتش ناجت',
            ],
            'photo' => 'example/restaurant/product/sandwich_nugget.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 4,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich brochette',
                'en' => 'Skewer sandwich',
                'tn' => 'Sandwich brochette',
                'ar' => 'ساندوتش سيخ',
            ],
            'photo' => 'example/restaurant/product/sandwich_brochette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 5,
            'added_loyalty_points' => 0,
        ]);

/*
        Product::factory()->create([
            'name' => [
                'fr' => 'Sandwich crevette',
                'en' => 'Shrimp sandwich',
                'tn' => 'Sandwich crevette',
                'ar' => 'ساندوتش جمبري',
            ],
            'photo' => 'example/restaurant/product/sandwich_crevette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 6,
            'added_loyalty_points' => 0,
     ]);
*/
    }

    /**
     *
     */
    public function productsForMakloub()
    {
        $categoryMakloubId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Makloub'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Makloub escalope',
                'en' => 'Escalope makloub',
                'tn' => 'Ma9loub escalope',
                'ar' => 'مقلوب اسكالوب',
            ],
            'photo' => 'example/restaurant/product/ma9loub_escalope.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 1,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Makloub thon',
                'en' => 'Tuna makloub',
                'tn' => 'Ma9loub thon',
                'ar' => 'مقلوب تن',
            ],
            'photo' => 'example/restaurant/product/makloub_thon.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 2,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Makloub jambon',
                'en' => 'Ham makloub',
                'tn' => 'Ma9loub jambon',
                'ar' => 'ساندويش جمبون',
            ],
            'photo' => 'example/restaurant/product/makloub_jambon.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 3,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Makloub nugget',
                'en' => 'Nugget makloub',
                'tn' => 'Ma9loub nugget',
                'ar' => 'مقلوب ناجت',
            ],
            'photo' => 'example/restaurant/product/makloub_nugget.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 4,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Makloub brochette',
                'en' => 'Skewer makloub',
                'tn' => 'Ma9loub brochette',
                'ar' => 'مقلوب سيخ',
            ],
            'photo' => 'example/restaurant/product/makloub_brochette.png',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 5,
            'added_loyalty_points' => 0,
        ]);
    }

    /**
     *
     */
    public function productsForPizza()
    {
        $pizzaId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza'")->first()->id;
/*
        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza au choix',
                'en' => 'Choice pizza',
                'tn' => 'Pizza au choix',
                'ar' => 'بيتزا بالإختيار',
            ],
            'photo' => 'example/restaurant/product/pizza_4gout.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => 1,
            'added_loyalty_points' => 0,
      ]);
*/

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
            'order' => 1,
            'added_loyalty_points' => 2,
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
            'order' => 2,
            'added_loyalty_points' => 3,
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
            'order' => 3,
            'added_loyalty_points' => 5,
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
            'order' => 4,
            'added_loyalty_points' => 3,
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
            'order' => 5,
            'added_loyalty_points' => 3,
        ]);

/*
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
            'order' => 6,
            'added_loyalty_points' => 3,
        ]);
*/

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
            'order' => 6,
            'added_loyalty_points' => 2,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza jambon',
                'en' => 'Ham pizza',
                'tn' => 'Pizza jambon',
                'ar' => 'بيتزا جمبون',
            ],
            'photo' => 'example/restaurant/product/pizza_jambon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => 7,
            'added_loyalty_points' => 3,
        ]);
    }

    /**
     *
     */
    public function productsForPizzaSauceBlanche()
    {
        $pizzaSauceBlancheId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza sauce blanche'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza fruit de mer',
                'en' => 'Seafood pizza',
                'tn' => 'Pizza fruit de mer',
                'ar' => 'بيتزا المأكولات البحرية',
            ],
            'photo' => 'example/restaurant/product/pizza_fruit_mer.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => 1,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza 4 fromages',
                'en' => '4 cheese pizza',
                'tn' => 'Pizza 4 fromages',
                'ar' => 'بيتزا 4 أجبان',
            ],
            'photo' => 'example/restaurant/product/pizza_4fromage.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => 2,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza jambon',
                'en' => 'Ham pizza',
                'tn' => 'Pizza jambon',
                'ar' => 'بيتزا جمبون',
            ],
            'photo' => 'example/restaurant/product/pizza_jambon.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => 3,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Pizza indienne',
                'en' => 'Indian pizza',
                'tn' => 'Pizza indienne',
                'ar' => 'بيتزا هندية',
            ],
            'photo' => 'example/restaurant/product/pizza_indienne.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => 4,
            'added_loyalty_points' => 3,
        ]);
    }

    /**
     *
     */
    public function productsForBaguetteFarcie()
    {
        $baguetteFarcieId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Baguette farcie'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr' => 'Baguette farcie thon',
                'en' => 'Tuna stuffed baguette',
                'tn' => 'Baguette farcie thon',
                'ar' => 'باغيت محشي تن',
            ],
            'photo' => 'example/restaurant/product/baguette5.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => 1,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Baguette farcie 4 fromages',
                'en' => '4 cheese stuffed baguette',
                'tn' => 'Baguette farcie 4 fromages',
                'ar' => 'باغيت محشي 4 أجبان',
            ],
            'photo' => 'example/restaurant/product/baguette3.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => 2,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Baguette farcie escalope',
                'en' => 'Escalope stuffed baguette',
                'tn' => 'Baguette farcie',
                'ar' => 'باغيت محشي اسكالوب',
            ],
            'photo' => 'example/restaurant/product/baguette2.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => 3,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr' => 'Baguette farcie escalope pané',
                'en' => 'Breaded Escalope stuffed baguette',
                'tn' => 'Baguette farcie escalope pané',
                'ar' => 'باغيت محشي اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/baguette4.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => 4,
            'added_loyalty_points' => 0,
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
            'order' => 1,
            'added_loyalty_points' => 5,
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
            'order' => 2,
            'added_loyalty_points' => 4,
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
            'order' => 3,
            'added_loyalty_points' => 5,
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
            'order' => 4,
            'added_loyalty_points' => 5,
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
            'order' => 5,
            'added_loyalty_points' => 4,
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
            'order' => 6,
            'added_loyalty_points' => 5,
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
            'order' => 7,
            'added_loyalty_points' => 5,
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
            'order' => 8,
            'added_loyalty_points' => 5,
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
            'order' => 9,
            'added_loyalty_points' => 5,
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
            'order' => 1,
            'added_loyalty_points' => 0,
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
            'order' => 2,
            'added_loyalty_points' => 0,
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
            'order' => 3,
            'added_loyalty_points' => 0,
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
            'order' => 4,
            'added_loyalty_points' => 0,
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
            'order' => 1,
            'added_loyalty_points' => 1,
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
            'order' => 2,
            'added_loyalty_points' => 0,
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
            'order' => 3,
            'added_loyalty_points' => 0,
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
            'order' => 4,
            'added_loyalty_points' => 0,
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
            'order' => 5,
            'added_loyalty_points' => 0,
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
            'order' => 6,
            'added_loyalty_points' => 0,
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
            'order' => 7,
            'added_loyalty_points' => 0,
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

        $testPaginationCategoryId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'FR_Test_pagination_category'")->first()->id;
        Product::factory()->count(100)->create([ 'category_id' => $testPaginationCategoryId ]);
    }
}
