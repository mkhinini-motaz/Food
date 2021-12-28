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
        $this->productsForBox();
        $this->productsForTacos();
        $this->productsForSandwich();
        $this->productsForPizza();
        $this->productsForPizzaSauceBlanche();
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
                'fr'   => 'Brochette',
                'en'   => 'Skewer',
                'tnfr' => 'Brochette',
                'tnar' => 'بروشات',
                'ar'   => 'سيخ',
            ],
            'description' => [
                'fr'   => 'Tacos 1 viande au choix, brochette, escalope panné, 2 jambons, salami, cheddar et frites',
                'en'   => '1 meat tacos of your choice, skewer, breaded escalope, 2 hams, salami, cheddar and french fries',
                'tnfr' => 'Tacos 1 viande au choix, brochette, escalope panné, 2 jambons, salami, cheddar w frites',
                'tnar' => 'تاكو 1 لحم من اختيارك، بروشات، اسكالوب باني، 2 جمبون، سلامي، شيدر و فريت',
                'ar'   => 'تاكو 1 لحم من اختيارك، سيخ، اسكالوب مخبوز، 2 جمبون، سلامي، جبن شيدر و بطاطس مقلية',
            ],
            'photo' => 'example/restaurant/product/box_brochette.png',
            'category_id' => $categoryBoxId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
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
                'fr'   => 'Tacos 1 viande au choix, chawarma, escalope, escalope panné, 2 jambons, salami, cheddar et frites',
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
                'fr'   => 'Small 1 viande',
                'en'   => 'Small 1 meat',
                'tnfr' => 'Ssmall 1 viande',
                'tnar' => 'صغير لحمة وحدة',
                'ar'   => 'صغير لحمة واحدة',
            ],
            'description' => [
                'fr'   => '1 viande au choix, sauces au choix, frites et notre sauce fromagère',
                'en'   => '1 meat of your choice, sauces of your choice, fries and our cheese sauce',
                'tnfr' => '1 viande au choix, sauces au choix, frites w sauce fromagère mta3na',
                'tnar' => 'لحمة من اختيارك ، سوسات من اختيارك، فريت و سوس فرماج متاعنا',
                'ar'   => 'لحمة من اختيارك ، صوصات من اختيارك، بطاطا مقلية و صلصة الجبن الخاصة بنا',
            ],
            'photo' => 'example/restaurant/product/tacos_s.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 2,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Medium 2 viandes',
                'en'   => 'Medium 2 meats',
                'tnfr' => 'Medium 2 viandes',
                'tnar' => 'متوسط لحمتين',
                'ar'   => 'متوسط لحمتان',
            ],
            'description' => [
                'fr'   => '1 viande au choix, sauces au choix, frites et notre sauce fromagère',
                'en'   => '1 meat of your choice, sauces of your choice, fries and our cheese sauce',
                'tnfr' => '1 viande au choix, sauces au choix, frites w sauce fromagère mta3na',
                'tnar' => 'لحمتين من اختيارك ، سوسات من اختيارك، فريت سوس فرماج متاعنا',
                'ar'   => 'لحمتين من اختيارك ، صوصات من اختيارك، بطاطا مقلية وصلصة الجبن الخاصة بنا',
            ],
            'photo' => 'example/restaurant/product/tacos_m.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Large 3 viandes',
                'en'   => 'Large 3 meats',
                'tnfr' => 'Large 3 viandes',
                'tnar' => 'كبير ثلاث لحمات',
                'ar'   => 'كبير ثلاث لحوم',
            ],
            'description' => [
                'fr'   => '1 viande au choix, sauces au choix, frites et notre sauce fromagère',
                'en'   => '1 meat of your choice, sauces of your choice, fries and our cheese sauce',
                'tnfr' => '1 viande au choix, sauces au choix, frites w sauce fromagère mta3na',
                'tnar' => 'ثلاث لحمات من اختيارك ، سوسات من اختيارك، فريت سوس فرماج متاعنا',
                'ar'   => 'ثلاث لحوم من اختيارك ، صوصات من اختيارك، بطاطا مقلية وصلصة الجبن الخاصة بنا',
            ],
            'photo' => 'example/restaurant/product/tacos_l.jpg',
            'category_id' => $categoryTacosId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 5,
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
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/product/sandwich_thon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Jambon',
                'en'   => 'Ham',
                'tnfr' => 'Jambon',
                'tnar' => 'جمبون',
                'ar'   => 'جمبون',
            ],
            'photo' => 'example/restaurant/product/sandwich_jambon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Nugget',
                'en'   => 'Nugget',
                'tnfr' => 'Nugget',
                'tnar' => 'ناجت',
                'ar'   => 'ناجت',
            ],
            'photo' => 'example/restaurant/product/sandwich_nugget.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Brochette',
                'en'   => 'Skewer',
                'tnfr' => 'Brochette',
                'tnar' => 'بروشات',
                'ar'   => 'سيخ',
            ],
            'photo' => 'example/restaurant/product/sandwich_brochette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);
    }

    /**
     *
     */
    public function productsForPizza()
    {
        $order = 1;
        $pizzaId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pizza'")->first()->id;
/*
        Product::factory()->create([
            'name' => [
                'fr'   => 'Au choix',
                'en'   => 'By choice',
                'tnfr' => 'Au choix',
                'tnar' => 'بالإختيار',
                'ar'   => 'بالإختيار',
            ],
            'photo' => 'example/restaurant/product/pizza_4gout.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_WITH_OPTIONS,
            'order' => $order++,
            'added_loyalty_points' => 0,
      ]);
*/

        Product::factory()->create([
            'name' => [
                'fr'   => 'Margherita',
                'en'   => 'Margherita',
                'tnfr' => 'Margherita',
                'tnar' => 'مارغريتا',
                'ar'   => 'مارغريتا',
            ],
            'photo' => 'example/restaurant/product/pizza_margeritha.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 9000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Végétariéne',
                'en'   => 'Vegetarian',
                'tnfr' => 'Végétariéne',
                'tnar' => 'نباتية',
                'ar'   => 'نباتية',
            ],
            'photo' => 'example/restaurant/product/pizza_jambon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 11000,
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
            'added_loyalty_points' => 2,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Thon',
                'en'   => 'Tuna',
                'tnfr' => 'Thon',
                'tnar' => 'تن',
                'ar'   => 'تن',
            ],
            'photo' => 'example/restaurant/product/pizza_thon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pepperoni',
                'en'   => 'Pepperoni',
                'tnfr' => 'Pepperoni',
                'tnar' => 'بيبروني',
                'ar'   => 'بيبروني',
            ],
            'photo' => 'example/restaurant/product/pizza_pepperoni.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 12000,
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
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
            'price' => 12000,
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
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande',
                'en'   => 'Meat',
                'tnfr' => 'Viande',
                'tnar' => 'لحم',
                'ar'   => 'لحم',
            ],
            'photo' => 'example/restaurant/product/pizza_chicken.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ghost',
                'en'   => 'Ghost',
                'tnfr' => 'Ghost',
                'tnar' => 'جوست',
                'ar'   => 'جوست',
            ],
            'photo' => 'example/restaurant/product/pizza_fruit_mer.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
            'price' => 15000,
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
            'price' => 12000,
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
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 13000,
        ]);

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
                'fr'   => 'Safia 50ml',
                'en'   => 'Safia 50ml',
                'tnfr' => 'Safia 50ml',
                'tnar' => 'صافية 50 مل',
                'ar'   => 'صافية 50 مل',
            ],
            'photo' => 'example/restaurant/product/safia.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 1,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Coca cola',
                'en'   => 'Coca cola',
                'tnfr' => 'Coca cola',
                'tnar' => 'كوكا كولا',
                'ar'   => 'كوكا كولا',
            ],
            'photo' => 'example/restaurant/product/coca.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Fanta',
                'en'   => 'Fanta',
                'tnfr' => 'Fanta',
                'tnar' => 'فانتا',
                'ar'   => 'فانتا',
            ],
            'photo' => 'example/restaurant/product/fanta.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Boga Lime',
                'en'   => 'Boga Lime',
                'tnfr' => 'Boga Lime',
                'tnar' => 'بوقا ليم',
                'ar'   => 'بوقا ليمون',
            ],
            'photo' => 'example/restaurant/product/boga_lim.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Boga cidre',
                'en'   => 'Boga cidre',
                'tnfr' => 'Boga cidre',
                'tnar' => 'بوغا سيدر',
                'ar'   => 'بوغا سيدر',
            ],
            'photo' => 'example/restaurant/product/boga_cidre.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Apla',
                'en'   => 'Apla',
                'tnfr' => 'Apla',
                'tnar' => 'أبلا',
                'ar'   => 'أبلا',
            ],
            'photo' => 'example/restaurant/product/apla.jpg',
            'category_id' => $boissonId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
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
        ]);
    }
}
