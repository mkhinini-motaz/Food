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
//        $this->productsForBox();
        $this->productsForTacos();
        $this->productsForSandwich();
        $this->productsForPizza();
        $this->productsForPizzaSauceBlanche();
        $this->productsForAperetif();
        $this->productsForBoisson();
    }

    public function productsForBox()
    {
        $order = 1;
        $categoryBoxId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Box'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Simple',
                'en'   => 'Simple',
                'tnfr' => 'Simple',
                'tnar' => 'سيمبل',
                'ar'   => 'سيمبل',
            ],
            'description' => [
                'fr'   => 'Tacos 1 viande au choix, salade, pain, 2 jambons, salami, cheddar et frites',
                'en'   => '1 meat tacos of your choice, salad, bread, 2 hams, salami, cheddar and fries',
                'tnfr' => 'Tacos 1 viande au choix, slata, 5obz, 2 jambons, salami, cheddar w frites',
                'tnar' => 'تاكو 1 لحم من اختيارك، سلاطة، خبز، 2 جمبون، سلامي، شيدر و فريت',
                'ar'   => 'تاكو 1 لحم من اختيارك، سلطة، خبز، 2 جمبون، سلامي، جبن شيدر و بطاطس مقلية',
            ],
            'photo' => 'example/restaurant/product/box_simple.png',
            'category_id' => $categoryBoxId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Mixte',
                'en'   => 'Mixed',
                'tnfr' => 'Mixte',
                'tnar' => 'ميكست',
                'ar'   => 'ميكس',
            ],
            'description' => [
                'fr'   => 'Tacos 1 viande au choix, chawarma, escalope, escalope pané, 2 jambons, salami, cheddar et frites',
                'en'   => '1 meat tacos of your choice, chawarma, escalope, breaded escalope, 2 hams, salami, cheddar and french fries',
                'tnfr' => 'Tacos 1 viande au choix, chawarma, escalope, escalope panné, 2 jambons, salami, cheddar w frites',
                'tnar' => 'تاكو 1 لحم من اختيارك، شاورما، اسكالوب، اسكالوب باني، 2 جمبون، سلامي، شيدر و فريت',
                'ar'   => 'تاكو 1 لحم من اختيارك، شاورما، اسكالوب، اسكالوب مخبوز، 2 جمبون، سلامي، جبن شيدر و بطاطس مقلية',
            ],
            'photo' => 'example/restaurant/product/box_mixt.png',
            'category_id' => $categoryBoxId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'ڨوست',
                'ar'   => 'ڨوست',
            ],
            'description' => [
                'fr'   => 'Tacos 1 viande au choix, chawarma, escalope, escalope panné, salade, pain, 2 jambons, salami, cheddar et frites',
                'en'   => '1 meat tacos of your choice, chawarma, escalope, breaded escalope, salad, bread, 2 hams, salami, cheddar and french fries',
                'tnfr' => 'Tacos 1 viande au choix, chawarma, escalope, escalope panné, slata, 5obz, 2 jambons, salami, cheddar w frites',
                'tnar' => 'تاكو 1 لحم من اختيارك، شاورما، اسكالوب، اسكالوب باني، سلاطة، خبز، 2 جمبون، سلامي، شيدر و فريت',
                'ar'   => 'تاكو 1 لحم من اختيارك، شاورما، اسكالوب، اسكالوب مخبوز، سلطة، خبز، 2 جمبون، سلامي، جبن شيدر و بطاطس مقلية',
            ],
            'photo' => 'example/restaurant/product/box_ghost.png',
            'category_id' => $categoryBoxId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 8,
        ]);
    }

    /**
     *
     */
    public function productsForTacos()
    {
        $order = 1;
        $categoryTacosId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Tacos'")->first()->id;

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
            'price' => 13500,
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
            'price' => 8500,
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
            'price' => 8000,
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
            'price' => 7600,
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
            'price' => 7500,
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
            'price' => 7000,
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
            'price' => 7000,
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
            'price' => 7000,
        ]);
    }

    /**
     *
     */
    public function productsForSandwich()
    {
        $order = 1;
        $categorySandwichId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Sandwich'")->first()->id;

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
            'price' => 8200,
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
            'price' => 7800,
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
            'price' => 7400,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/sandwich_escalope.png',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 7300,
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
            'price' => 6700,
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
            'price' => 6700,
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
            'price' => 6700,
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
            'price' => 6500,
        ]);
    }

    /**
     *
     */
    public function productsForPizza()
    {
        $order = 1;
        $pizzaId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza'")->first()->id;

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
            'photo' => 'example/restaurant/product/pizzaghost.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
            'price' => 15000,
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
            'price' => 14000,
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
            'price' => 14000,
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
            'price' => 13500,
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
            'price' => 13500,
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
            'price' => 13000,
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
            'price' => 13000,
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
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Napolitaine',
                'en'   => 'Napolitan',
                'tnfr' => 'Napolitaine',
                'tnar' => 'نابوليتان',
                'ar'   => 'نابوليتان',
            ],
            'photo' => 'example/restaurant/product/pizza_margeritha.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 12000,
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
            'price' => 12000,
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
            'price' => 9000,
        ]);
    }

    /**
     *
     */
    public function productsForPizzaSauceBlanche()
    {
        $order = 1;
        $pizzaSauceBlancheId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza sauce blanche'")->first()->id;

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
            'photo' => 'example/restaurant/product/pizza4fblanche.jpg',
            'category_id' => $pizzaSauceBlancheId,
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
            'photo' => 'example/restaurant/product/pizza_regina.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 13000,
        ]);
    }

    /**
     *
     */
    public function productsForAperetif()
    {
        $order = 1;
        $entreeId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Entrées'")->first()->id;

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
        ]);
    }

    /**
     *
     */
    public function productsForBoisson()
    {
        $order = 1;
        $boissonId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Boissons'")->first()->id;

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
            'price' => 5000,
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
            'price' => 2000,
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
            'price' => 1500,
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
