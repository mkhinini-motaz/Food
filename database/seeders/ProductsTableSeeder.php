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
        $this->productsForBox();
        $this->productsForTacos();
        $this->productsForSandwich();
        $this->productsForMakloub();
        $this->productsForPizza();
        $this->productsForPizzaSauceBlanche();
        $this->productsForBaguetteFarcie();
        $this->productsForPates();
        $this->productsForAperetif();
        $this->productsForBoisson();
//        $this->productsForTestPagination();
    }

    public function productsForBox()
    {
        $order = 1;
        $categoryBoxId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Box'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Box simple',
                'en'   => 'Simple box',
                'tnfr' => 'Box simple',
                'tnar' => 'بوكس سيمبل',
                'ar'   => 'بوكس سيمبل',
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Box brochette',
                'en'   => 'Skewer box',
                'tnfr' => 'Box brochette',
                'tnar' => 'بوكس بروشات',
                'ar'   => 'بوكس سيخ',
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Box mixte',
                'en'   => 'Mixed box',
                'tnfr' => 'Box mixte',
                'tnar' => 'بوكس ميكست',
                'ar'   => 'بوكس ميكس',
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Box ghost',
                'en'   => 'Ghost box',
                'tnfr' => 'Box ghost',
                'tnar' => 'بوكس ڨوست',
                'ar'   => 'بوكس ڨوست',
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
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
                'fr'   => 'Tacos S 1 viande',
                'en'   => 'French tacos S 1 meat',
                'tnfr' => 'Tacos S 1 viande',
                'tnar' => 'تاكوس إس لحمة وحدة',
                'ar'   => 'تاكوس إس لحمة واحدة',
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 2,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tacos M 2 viandes',
                'en'   => 'French tacos M 2 meats',
                'tnfr' => 'Tacos M 2 viandes',
                'tnar' => 'تاكوس إم لحمتين',
                'ar'   => 'تاكوس إم لحمتان',
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tacos L 3 viandes',
                'en'   => 'French tacos L 3 meats',
                'tnfr' => 'Tacos L 3 viandes',
                'tnar' => 'تاكوس إل ثلاث لحمات',
                'ar'   => 'تاكوس إل ثلاث لحوم',
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
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);
    }

    /**
     *
     */
    public function productsForPlats()
    {
        $order = 1;
        $categoryPlatsId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Plats'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope pané',
                'en'   => 'Breaded escalope',
                'tnfr' => 'Escalope pané',
                'tnar' => 'اسكالوب باني',
                'ar'   => 'اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/escalope_pane.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope grillé',
                'en'   => 'Grilled escalope',
                'tnfr' => 'Escalope mechwi',
                'tnar' => 'اسكالوب مشوي',
                'ar'   => 'اسكالوب مشوي',
            ],
            'photo' => 'example/restaurant/product/escalope_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope citron',
                'en'   => 'Lemon escalope',
                'tnfr' => 'Escalope citron',
                'tnar' => 'اسكالوب سترون',
                'ar'   => 'اسكالوب ليمون',
            ],
            'photo' => 'example/restaurant/product/escalope_citron.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Escalope sauce champignon',
                'en'   => 'Escalope with mushroom sauce',
                'tnfr' => 'Escalope sauce champignon',
                'tnar' => 'اسكالوب مع سوس الفطر',
                'ar'   => 'اسكالوب مع صوص الفطر',
            ],
            'photo' => 'example/restaurant/product/escalope_sauce_champignon.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Cordon bleu',
                'en'   => 'Cordon bleu',
                'tnfr' => 'Cordon bleu',
                'tnar' => 'كوردون بلو',
                'ar'   => 'كوردون بلو',
            ],
            'photo' => 'example/restaurant/product/plat_cordon_bleu.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Brochette viande',
                'en'   => 'Meat skewer',
                'tnfr' => 'Brochette viande',
                'tnar' => 'بروشات لحم',
                'ar'   => 'سيخ لحم',
            ],
            'photo' => 'example/restaurant/product/brochette_viande.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Brochette escalope',
                'en'   => 'Escalope skewer',
                'tnfr' => 'Brochette escalope',
                'tnar' => 'بروشات اسكالوب',
                'ar'   => 'سيخ اسكالوب',
            ],
            'photo' => 'example/restaurant/product/brochette_escalope.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande grillé',
                'en'   => 'Grilled meat',
                'tnfr' => 'Viande grillé',
                'tnar' => 'لحم مشوي',
                'ar'   => 'لحم مشوي',
            ],
            'photo' => 'example/restaurant/product/viande_grille.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Grillade mixte',
                'en'   => 'Mixed grill',
                'tnfr' => 'Grillade mixte',
                'tnar' => 'جرياد ميكست',
                'ar'   => 'ميكس جريل',
            ],
            'photo' => 'example/restaurant/product/grillade_mix.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Paella',
                'en'   => 'Paella',
                'tnfr' => 'Paella',
                'tnar' => 'بايلا',
                'ar'   => 'بايلا',
            ],
            'photo' => 'example/restaurant/product/paella.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_FIXED,
            'is_visible' => 0,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Beignet crevette',
                'en'   => 'Shrimp crackers',
                'tnfr' => 'Beignet crevette',
                'tnar' => 'بنياي كروفت',
                'ar'   => 'مقرمشات جمبري',
            ],
            'photo' => 'example/restaurant/product/beignet_crevette.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Calamar doré',
                'en'   => 'Golden squid',
                'tnfr' => 'Calamar doré',
                'tnar' => 'كلمار دوري',
                'ar'   => 'الحبار الذهبي',
            ],
            'photo' => 'example/restaurant/product/calamar_dore.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);


        Product::factory()->create([
            'name' => [
                'fr'   => 'Symfonie fruit de mer',
                'en'   => 'Seafood symphony',
                'tnfr' => 'Symfonie fruit de mer',
                'tnar' => 'سيمفوني غلال البحر',
                'ar'   => 'سيمفونية غلال البحر',
            ],
            'photo' => 'example/restaurant/product/plat_fruit_mer.jpg',
            'category_id' => $categoryPlatsId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'is_visible' => 0,
            'order' => $order++,
            'added_loyalty_points' => 0,
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
                'fr'   => 'Sandwich escalope',
                'en'   => 'Escalope sandwich',
                'tnfr' => 'Sandwich escalope',
                'tnar' => 'سندويتش اسكالوب',
                'ar'   => 'ساندوتش اسكالوب',
            ],
            'photo' => 'example/restaurant/product/sandwich_escalope.png',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Sandwich thon',
                'en'   => 'Tuna sandwich',
                'tnfr' => 'Sandwich thon',
                'tnar' => 'سندويتش تن',
                'ar'   => 'ساندوتش تن',
            ],
            'photo' => 'example/restaurant/product/sandwich_thon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Sandwich jambon',
                'en'   => 'Ham sandwich',
                'tnfr' => 'Sandwich jambon',
                'tnar' => 'سندويتش جمبون',
                'ar'   => 'ساندويش جمبون',
            ],
            'photo' => 'example/restaurant/product/sandwich_jambon.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Sandwich nugget',
                'en'   => 'Nugget sandwich',
                'tnfr' => 'Sandwich nugget',
                'tnar' => 'سندويتش ناجت',
                'ar'   => 'ساندوتش ناجت',
            ],
            'photo' => 'example/restaurant/product/sandwich_nugget.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Sandwich brochette',
                'en'   => 'Skewer sandwich',
                'tnfr' => 'Sandwich brochette',
                'tnar' => 'سندويتش بروشات',
                'ar'   => 'ساندوتش سيخ',
            ],
            'photo' => 'example/restaurant/product/sandwich_brochette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

/*
        Product::factory()->create([
            'name' => [
                'fr'   => 'Sandwich crevette',
                'en'   => 'Shrimp sandwich',
                'tnfr' => 'Sandwich crevette',
                'tnar' => 'سندويتش كروفت',
                'ar'   => 'ساندوتش جمبري',
            ],
            'photo' => 'example/restaurant/product/sandwich_crevette.jpg',
            'category_id' => $categorySandwichId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
     ]);
*/
    }

    /**
     *
     */
    public function productsForMakloub()
    {
        $order = 1;
        $categoryMakloubId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Makloub'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Makloub escalope',
                'en'   => 'Escalope makloub',
                'tnfr' => 'Ma9loub escalope',
                'tnar' => 'مقلوب اسكالوب',
                'ar'   => 'مقلوب اسكالوب',
            ],
            'photo' => 'example/restaurant/product/ma9loub_escalope.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Makloub thon',
                'en'   => 'Tuna makloub',
                'tnar' => 'مقلوب تن',
                'tnfr' => 'Ma9loub thon',
                'ar'   => 'مقلوب تن',
            ],
            'photo' => 'example/restaurant/product/makloub_thon.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Makloub jambon',
                'en'   => 'Ham makloub',
                'tnfr' => 'Ma9loub jambon',
                'tnar' => 'مقلوب جمبون',
                'ar'   => 'مقلوب جمبون',
            ],
            'photo' => 'example/restaurant/product/makloub_jambon.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Makloub nugget',
                'en'   => 'Nugget makloub',
                'tnfr' => 'Ma9loub nugget',
                'tnar' => 'مقلوب ناجت',
                'ar'   => 'مقلوب ناجت',
            ],
            'photo' => 'example/restaurant/product/makloub_nugget.jpg',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Makloub brochette',
                'en'   => 'Skewer makloub',
                'tnfr' => 'Ma9loub brochette',
                'tnar' => 'مقلوب بروشات',
                'ar'   => 'مقلوب سيخ',
            ],
            'photo' => 'example/restaurant/product/makloub_brochette.png',
            'category_id' => $categoryMakloubId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
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
                'fr'   => 'Pizza au choix',
                'en'   => 'Choice pizza',
                'tnfr' => 'Pizza au choix',
                'tnar' => 'بيتزا بالإختيار',
                'ar'   => 'بيتزا بالإختيار',
            ],
            'photo' => 'example/restaurant/product/pizza_4gout.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_WITH_INGREDIENTS,
            'order' => $order++,
            'added_loyalty_points' => 0,
      ]);
*/

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza margherita',
                'en'   => 'Margherita Pizza',
                'tnfr' => 'Pizza margherita',
                'tnar' => 'بيتزا مارغريتا',
                'ar'   => 'بيتزا مارغريتا',
            ],
            'photo' => 'example/restaurant/product/pizza_margeritha.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza thon',
                'en'   => 'Tuna Pizza',
                'tnfr' => 'Pizza thon',
                'tnar' => 'بيتزا تن',
                'ar'   => 'بيتزا تن',
            ],
            'photo' => 'example/restaurant/product/pizza_thon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza fruit de mer',
                'en'   => 'Seafood pizza',
                'tnfr' => 'Pizza fruit de mer',
                'tnar' => 'بيتزا غلال البحر',
                'ar'   => 'بيتزا غلال البحر',
            ],
            'photo' => 'example/restaurant/product/pizza_fruit_mer.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza chicken',
                'en'   => 'Chicken pizza',
                'tnfr' => 'Pizza chicken',
                'tnar' => 'بيتزا دجاج',
                'ar'   => 'بيتزا دجاج',
            ],
            'photo' => 'example/restaurant/product/pizza_chicken.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza 4 fromages',
                'en'   => '4 cheese pizza',
                'tnfr' => 'Pizza 4 fromages',
                'tnar' => 'بيتزا 4 فرماج',
                'ar'   => 'بيتزا 4 أجبان',
            ],
            'photo' => 'example/restaurant/product/pizza_4fromage.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

/*
        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza pepperoni',
                'en'   => 'Pepperoni pizza',
                'tnfr' => 'Pizza pepperoni',
                'tnar' => 'بيتزا بيبروني',
                'ar'   => 'بيتزا بيبروني',
            ],
            'photo' => 'example/restaurant/product/pizza_pepperoni.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);
*/

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza regina',
                'en'   => 'Regina pizza',
                'tnfr' => 'Pizza regina',
                'tnar' => 'بيتزا ريجينا',
                'ar'   => 'بيتزا ريجينا',
            ],
            'photo' => 'example/restaurant/product/pizza_regina.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 2,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza jambon',
                'en'   => 'Ham pizza',
                'tnfr' => 'Pizza jambon',
                'tnar' => 'بيتزا جمبون',
                'ar'   => 'بيتزا جمبون',
            ],
            'photo' => 'example/restaurant/product/pizza_jambon.jpg',
            'category_id' => $pizzaId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
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
                'fr'   => 'Pizza fruit de mer',
                'en'   => 'Seafood pizza',
                'tnfr' => 'Pizza fruit de mer',
                'tnar' => 'بيتزا غلال البحر',
                'ar'   => 'بيتزا غلال البحر',
            ],
            'photo' => 'example/restaurant/product/pizza_fruit_mer.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza 4 fromages',
                'en'   => '4 cheese pizza',
                'tnfr' => 'Pizza 4 fromages',
                'tnar' => 'بيتزا 4 فرماج',
                'ar'   => 'بيتزا 4 أجبان',
            ],
            'photo' => 'example/restaurant/product/pizza_4fromage.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza jambon',
                'en'   => 'Ham pizza',
                'tnfr' => 'Pizza jambon',
                'tnar' => 'بيتزا جمبون',
                'ar'   => 'بيتزا جمبون',
            ],
            'photo' => 'example/restaurant/product/pizza_jambon.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pizza indienne',
                'en'   => 'Indian pizza',
                'tnfr' => 'Pizza indienne',
                'tnar' => 'بيتزا هندية',
                'ar'   => 'بيتزا هندية',
            ],
            'photo' => 'example/restaurant/product/pizza_indienne.jpg',
            'category_id' => $pizzaSauceBlancheId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
        ]);
    }

    /**
     *
     */
    public function productsForBaguetteFarcie()
    {
        $order = 1;
        $baguetteFarcieId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Baguette farcie'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Baguette farcie thon',
                'en'   => 'Tuna stuffed baguette',
                'tnfr' => 'Baguette farcie thon',
                'tnar' => 'باغيت فارسي تن',
                'ar'   => 'باغيت محشي تن',
            ],
            'photo' => 'example/restaurant/product/baguette5.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Baguette farcie 4 fromages',
                'en'   => '4 cheese stuffed baguette',
                'tnfr' => 'Baguette farcie 4 fromages',
                'tnar' => 'باغيت فارسي 4 فرماج',
                'ar'   => 'باغيت محشي 4 أجبان',
            ],
            'photo' => 'example/restaurant/product/baguette3.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Baguette farcie escalope',
                'en'   => 'Escalope stuffed baguette',
                'tnfr' => 'Baguette farcie',
                'tnar' => 'باغيت فرماج اسكالوب',
                'ar'   => 'باغيت محشي اسكالوب',
            ],
            'photo' => 'example/restaurant/product/baguette2.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Baguette farcie escalope pané',
                'en'   => 'Breaded Escalope stuffed baguette',
                'tnfr' => 'Baguette farcie escalope pané',
                'tnar' => 'باغيت فرماج اسكالوب باني',
                'ar'   => 'باغيت محشي اسكالوب مخبوز',
            ],
            'photo' => 'example/restaurant/product/baguette4.jpg',
            'category_id' => $baguetteFarcieId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);
    }


    /**
     *
     */
    public function productsForPates()
    {
        $order = 1;
        $patesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Pâtes'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Lasagne fruit mer',
                'en'   => 'Seafood lasagna',
                'tnfr' => 'Lasagne fruit mer',
                'tnar' => 'لازانيا المأكولات بحرية',
                'ar'   => 'لازانيا المأكولات بحرية',
            ],
            'photo' => 'example/restaurant/product/lasagne_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Lasagne viande haché',
                'en'   => 'Minced meat lasagna',
                'tnfr' => 'Lasagne viande haché',
                'tnar' => 'لازانيا باللحم المفروم',
                'ar'   => 'لازانيا باللحم المفروم',
            ],
            'photo' => 'example/restaurant/product/lasagne_viande_hache.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 4,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tagliatelle fruit de mer',
                'en'   => 'Seafood tagliatelle',
                'tnfr' => 'Tagliatelle fruit de mer',
                'tnar' => 'تالياتيلي غلال البحر',
                'ar'   => 'تالياتيلي غلال البحر',
            ],
            'photo' => 'example/restaurant/product/tagliatelle_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tagliatelles saumon',
                'en'   => 'Salmon tagliatelle',
                'tnfr' => 'Tagliatelles saumon',
                'tnar' => 'تالياتيلي السومون',
                'ar'   => 'تالياتيلي السلمون',
            ],
            'photo' => 'example/restaurant/product/tagliatelles_saumon.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Spaghetti bolognaise',
                'en'   => 'Spaghetti Bolognese',
                'tnfr' => 'Spaghetti bolognaise',
                'tnar' => 'سباجيتي بولوناز',
                'ar'   => 'سباجيتي بولونية',
            ],
            'photo' => 'example/restaurant/product/spaghetti_bolognaise.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 4,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Spaghetti fruit de mer',
                'en'   => 'Seafood spaghetti',
                'tnfr' => 'Spaghetti fruit de mer',
                'tnar' => 'سباجيتي غلال البحر',
                'ar'   => 'سباجيتي غلال البحر',
            ],
            'photo' => 'example/restaurant/product/spaghetti_fruit_mer.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Spaghetti fruit de mer sauce blanche',
                'en'   => 'Seafood spaghetti with white sauce',
                'tnfr' => 'Spaghetti fruit de mer sauce blanche',
                'tnar' => 'سباجيتي غلال البحر سوس بلانش',
                'ar'   => 'سباجيتي غلال البحر مع الصلصة البيضاء',
            ],
            'photo' => 'example/restaurant/product/spaghetti_fruit_mer_sauce_blanche.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Spaghetti saumon fumé',
                'en'   => 'Smoked salmon spaghetti',
                'tnfr' => 'Spaghetti saumon fumé',
                'tnar' => 'سباجيتي سومون فيومي',
                'ar'   => 'سباجيتي السلمون المدخن',
            ],
            'photo' => 'example/restaurant/product/spaghetti_saumon_fume.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Penne saumon',
                'en'   => 'Salmon penne',
                'tnfr' => 'Penne saumon',
                'tnar' => 'بيني سومون',
                'ar'   => 'سلمون بيني',
            ],
            'photo' => 'example/restaurant/product/penne_saumon.jpg',
            'category_id' => $patesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 5,
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
                'fr'   => 'Corn dog',
                'en'   => 'Corn dog',
                'tnfr' => 'Corn dog',
                'tnar' => 'كورن دوج',
                'ar'   => 'كورن دوج',
            ],
            'photo' => 'example/restaurant/product/corn_dog.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Nuggets',
                'en'   => 'Nuggets',
                'tnfr' => 'Nuggets',
                'tnar' => 'ناجت',
                'ar'   => 'ناجت',
            ],
            'photo' => 'example/restaurant/product/nugget.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Bric',
                'en'   => 'Bric',
                'tnfr' => 'Bric',
                'tnar' => 'بريك',
                'ar'   => 'بريك',
            ],
            'photo' => 'example/restaurant/product/bric_finger.jpg',
            'category_id' => $entreeId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 0,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Frites',
                'en'   => 'French fries',
                'tnfr' => 'Frites',
                'tnar' => 'فريت',
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
