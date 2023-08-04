<?php

namespace Database\Seeders\TestShop;

use App\Models\Category;
use App\Models\Product;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->productsForTacos();
        $this->productsForSandwich();
        $this->productsForPizza();
        $this->productsForPizzaSauceBlanche();
        $this->productsForAperetif();
        $this->productsForBoisson();
    }

    /**
     *
     */
    public function productsForTacos()
    {
        $order = 1;
        $shop = Shop::where('name', '=', 'Test shop')->first();
        $categoryTacosId = $shop->categories()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos'")
            ->first()
            ->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Géant',
                'en'   => 'Geant',
                'tnfr' => 'Géant',
                'tnar' => 'عملاق',
                'ar'   => 'عملاق',
            ],
            'photo' => 'example/restaurant/product/tacosgeant.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 4,
            'price' => 15000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'جوست',
                'ar'   => 'جوست',
            ],
            'photo' => 'example/restaurant/product/tacosghost.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 9500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande de boeuf',
                'en'   => 'Beaf meat',
                'tnfr' => 'Viande de boeuf',
                'tnar' => 'لحم بقري',
                'ar'   => 'لحم بقري',
            ],
            'photo' => 'example/restaurant/product/tacosviande.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande hachée',
                'en'   => 'Hashed meat',
                'tnfr' => 'Viande hachée',
                'tnar' => 'لحم مفروم',
                'ar'   => 'لحم مفروم',
            ],
            'photo' => 'example/restaurant/product/tacosvh.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 8600,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/tacos_s.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 8500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Cordon bleu',
                'en'   => 'Cordon bleu',
                'tnfr' => 'Cordon bleu',
                'tnar' => 'كوردون بلو',
                'ar'   => 'كوردون بلو',
            ],
            'photo' => 'example/restaurant/product/tacoscb.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 8000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/product/tacos_s.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 8000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/product/tacosescalope.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 8000,
        ]);
    }

    /**
     *
     */
    public function productsForSandwich()
    {
        $order = 1;
        $shop = Shop::where('name', '=', 'Test shop')->first();
        $categorySandwichId = $shop->categories()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sandwich'")
            ->first()
            ->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'جوست',
                'ar'   => 'جوست',
            ],
            'photo' => 'example/restaurant/product/sandwichghost.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 9200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande de boeuf',
                'en'   => 'Beaf meat',
                'tnfr' => 'Viande de boeuf',
                'tnar' => 'لحم بقري',
                'ar'   => 'لحم بقري',
            ],
            'photo' => 'example/restaurant/product/sandwichviande.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 8800,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande hachée',
                'en'   => 'Hashed meat',
                'tnfr' => 'Viande hachée',
                'tnar' => 'لحم مفروم',
                'ar'   => 'لحم مفروم',
            ],
            'photo' => 'example/restaurant/product/sandwich_escalope.png',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 8400,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/sandwichescalopepane.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 8300,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Cordon bleu',
                'en'   => 'Cordon bleu',
                'tnfr' => 'Cordon bleu',
                'tnar' => 'كوردون بلو',
                'ar'   => 'كوردون بلو',
            ],
            'photo' => 'example/restaurant/product/sandwichcb.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 7700,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/product/sandwich_chawarma.png',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 7700,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/product/sandwich_escalope.png',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 7700,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/product/sandwichtn.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 7500,
        ]);
    }

    /**
     *
     */
    public function productsForPizza()
    {
        $order = 1;
        $shop = Shop::where('name', '=', 'Test shop')->first();
        $pizzaId = $shop->categories()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza'")
            ->first()
            ->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Au choix',
                'en'   => 'By choice',
                'tnfr' => 'Au choix',
                'tnar' => 'بالإختيار',
                'ar'   => 'بالإختيار',
            ],
            'photo' => 'example/restaurant/product/pizza4choix.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 5,
            'price' => 17000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'جوست',
                'ar'   => 'جوست',
            ],
            'photo' => 'example/restaurant/product/pizzaghost.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
            'price' => 16000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande hachée',
                'en'   => 'Hashed meat',
                'tnfr' => 'Viande hachée',
                'tnar' => 'لحم مفروم',
                'ar'   => 'لحم مفروم',
            ],
            'photo' => 'example/restaurant/product/pizzavh.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 15000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/product/pizza_4fromage.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 15000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope',
                'en'   => 'Escalope',
                'tnfr' => 'Escalope',
                'tnar' => 'اسكالوب',
                'ar'   => 'اسكالوب',
            ],
            'photo' => 'example/restaurant/product/pizzaescalope.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 14500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Chawarma',
                'en'   => 'Chawarma',
                'tnfr' => 'Chawarma',
                'tnar' => 'شاورما',
                'ar'   => 'شاورما',
            ],
            'photo' => 'example/restaurant/product/pizzachawarma.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 14500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/product/pizzathon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pepperoni',
                'en'   => 'Pepperoni',
                'tnfr' => 'Pepperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/product/pizzapeperoni.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Capricciosa',
                'en'   => 'Capricciosa',
                'tnfr' => 'Capricciosa',
                'tnar' => 'كبريسيوزا',
                'ar'   => 'كبريسيوزا',
            ],
            'photo' => 'example/restaurant/product/pizzacapriciosa.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 14000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Napolitaine',
                'en'   => 'Napolitan',
                'tnfr' => 'Napolitaine',
                'tnar' => 'نابوليتان',
                'ar'   => 'نابوليتان',
            ],
            'photo' => 'example/restaurant/product/pizzanapolitaine.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Végétariéne',
                'en'   => 'Vegetarian',
                'tnfr' => 'Végétariéne',
                'tnar' => 'نباتية',
                'ar'   => 'نباتية',
            ],
            'photo' => 'example/restaurant/product/pizzavege.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Margherita',
                'en'   => 'Margherita',
                'tnfr' => 'Margherita',
                'tnar' => 'مارغريتا',
                'ar'   => 'مارغريتا',
            ],
            'photo' => 'example/restaurant/product/pizzamarg.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 10000,
        ]);
    }

    /**
     *
     */
    public function productsForPizzaSauceBlanche()
    {
        $order = 1;
        $shop = Shop::where('name', '=', 'Test shop')->first();
        $pizzaSauceBlancheId = $shop->categories()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza sauce blanche'")
            ->first()
            ->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'جوست',
                'ar'   => 'جوست',
            ],
            'photo' => 'example/restaurant/product/pizza_fruit_mer.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
            'price' => 16000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/product/pizza4fblanche.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 15000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Capricciosa',
                'en'   => 'Capricciosa',
                'tnfr' => 'Capricciosa',
                'tnar' => 'كبريسيوزا',
                'ar'   => 'كبريسيوزا',
            ],
            'photo' => 'example/restaurant/product/pizza_regina.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 14000,
        ]);
    }

    /**
     *
     */
    public function productsForAperetif()
    {
        $order = 1;
        $shop = Shop::where('name', '=', 'Test shop')->first();
        $entreeId = $shop->categories()
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = 'Entrées'")
            ->first()
            ->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/escpane.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Cordon bleu',
                'en'   => 'Cordon bleu',
                'tnfr' => 'Cordon bleu',
                'tnar' => 'كوردون بلو',
                'ar'   => 'كوردون بلو',
            ],
            'photo' => 'example/restaurant/product/cordonbleu.png',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Portion frites',
                'en'   => 'Extra ries',
                'tnfr' => 'Portion prites',
                'tnar' => 'بورسيون  فريت',
                'ar'   => 'البطاطس المقلية',
            ],
            'photo' => 'example/restaurant/product/frites_parsley.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => '4 fromages',
                'en'   => '4 cheese',
                'tnfr' => '4 fromages',
                'tnar' => '4 فرماج',
                'ar'   => '4 أجبان',
            ],
            'photo' => 'example/restaurant/option/4fromages.png',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 4000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Bacon de boeuf',
                'en'   => 'Beef bacon',
                'tnfr' => 'Bacon de boeuf',
                'tnar' => 'بايكون بقري',
                'ar'   => 'بايكون بقر',
            ],
            'photo' => 'example/restaurant/option/bacon.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 4000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Bacon de dinde',
                'en'   => 'Turkey bacon',
                'tnfr' => 'Bacon dinde',
                'tnar' => 'بايكون دندون',
                'ar'   => 'بايكون الديك الرومي',
            ],
            'photo' => 'example/restaurant/option/bacondinde.png',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Peperoni',
                'en'   => 'Peperoni',
                'tnfr' => 'Peperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/option/peperoni.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Cheddar',
                'en'   => 'Cheddar',
                'tnfr' => 'Cheddar',
                'tnar' => 'شيدر',
                'ar'   => 'شيدر',
            ],
            'photo' => 'example/restaurant/option/chedar.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Mozzarella',
                'en'   => 'Mozzarella',
                'tnfr' => 'Mozzarella',
                'tnar' => 'موزاريلا',
                'ar'   => 'موزاريلا',
            ],
            'photo' => 'example/restaurant/option/mozzarella.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Champignon',
                'en'   => 'Mushroom',
                'tnfr' => 'Champignon',
                'tnar' => 'فطر',
                'ar'   => 'فطر',
            ],
            'photo' => 'example/restaurant/product/champignon.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 2000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Jambon',
                'en'   => 'Ham',
                'tnfr' => 'Jambon',
                'tnar' => 'جمبون',
                'ar'   => 'جمبون',
            ],
            'photo' => 'example/restaurant/option/jambon_dinde.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 3000,
        ]);
    }

    /**
     *
     */
    public function productsForBoisson()
    {
        $order = 1;
        $shopId = Shop::where('name', '=', 'Test shop')->first()->id;
        $boissonId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Boissons'")
            ->where('shop_id', '=', $shopId)
            ->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Boisson énergitique',
                'en'   => 'Energy drink',
                'tnfr' => 'Energy drink',
                'tnar' => 'مشروب طاقة',
                'ar'   => 'مشروب طاقة',
            ],
            'photo' => 'example/restaurant/product/shark.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 5500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Schweppes',
                'en'   => 'Schweppes',
                'tnfr' => 'Schweppes',
                'tnar' => 'شويبس',
                'ar'   => 'شويبس',
            ],
            'photo' => 'example/restaurant/product/apla.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orangina',
                'en'   => 'Orangina',
                'tnfr' => 'Orangina',
                'tnar' => 'أورانجينا',
                'ar'   => 'أورانجينا',
            ],
            'photo' => 'example/restaurant/product/orangina.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Canette',
                'en'   => 'Can',
                'tnfr' => 'Canette',
                'tnar' => 'كانات',
                'ar'   => 'كانات',
            ],
            'photo' => 'example/restaurant/product/coca.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 2000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Eau grand',
                'en'   => 'Big water',
                'tnfr' => 'Mi kbir',
                'tnar' => 'مي كبير',
                'ar'   => 'ماء كبير',
            ],
            'photo' => 'example/restaurant/product/mira1l.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 1500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Eau petit',
                'en'   => 'Small water',
                'tnfr' => 'Mi sghir',
                'tnar' => 'مي صغير',
                'ar'   => 'ماء صغير',
            ],
            'photo' => 'example/restaurant/product/mira05l.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
            'price' => 1000,
        ]);
    }
}
