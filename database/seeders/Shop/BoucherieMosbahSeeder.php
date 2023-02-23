<?php

namespace Database\Seeders\Shop;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopUser;
use Illuminate\Database\Seeder;

class BoucherieMosbahSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $shop = Shop::factory()->create([
            'name' => 'Boucherie Mosbah',
            'domain' => '',
            'service_id' => 3,
            'logo' => '',
            'is_approved' => 3,
            'min_order_price' => 3000,

            'working_hours' => [
                0 => [ 'start' => '07:00', 'end' => '16:00' ],
                1 => [ 'start' => '07:00', 'end' => '16:00' ],
                2 => [ 'start' => '07:00', 'end' => '16:00' ],
                3 => [ 'start' => '07:00', 'end' => '16:00' ],
                4 => [ 'start' => '07:00', 'end' => '16:00' ],
                5 => [ 'start' => '07:00', 'end' => '16:00' ],
                6 => [ 'start' => '07:00', 'end' => '16:00' ],
            ],
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Ahmed',
            'last_name' => 'Mosbah',
            'phone' => '+21623456109',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_OWNER,
            'shop_id' => $shop->id,
        ]);

        $this->categories();
        $this->productsSheep();
        $this->productsBeef();
    }

    /**
     *
     */
    private function categories()
    {
        $shopId = Shop::whereName('Boucherie Mosbah')->first()->id;

        $order = 1;
        Category::factory()->create([
            'name' => [
                'fr'   => 'Mouton',
                'en'   => 'Sheep',
                'tnfr' => '3allouch',
                'tnar' => 'علوش',
                'ar'   => 'خروف',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Boeuf',
                'en'   => 'Beef',
                'tnfr' => 'Bagri',
                'tnar' => 'بقري',
                'ar'   => 'بقري',
            ],
            'description' => [
                'fr'   => 'Des ingrédients frais dans un délicieux léger pain',
                'en'   => 'Fresh ingredients in a delicious light bread',
                'tnfr' => 'Des ingrédients frechk fi 5obz bnin w 5fif',
                'tnar' => 'مكونات فرشكة في خبز بنين و خفيف',
                'ar'   => 'مكونات طازجة في خبز لذيذ و خفيف',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);
    }

    /**
     *
     */
    private function productsBeef()
    {
        $categoryBeefId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Boeuf'")->first()->id;

        $order = 1;
        Product::factory()->create([
            'name' => [
                'fr'   => 'Filet',
                'en'   => 'Tenderloin',
                'tnfr' => 'Habra',
                'tnar' => 'هبرة',
                'ar'   => 'لحم المتن',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categoryBeefId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 30,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Côtelettes',
                'en'   => 'Chops',
                'tnfr' => 'Côtelettes',
                'tnar' => 'كتلات',
                'ar'   => 'كتلات',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categoryBeefId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 27,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Mixte',
                'en'   => 'Mixed',
                'tnfr' => 'M5allat',
                'tnar' => 'مخلط',
                'ar'   => 'متنوع',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categoryBeefId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 22,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Collier',
                'en'   => 'Neck',
                'tnfr' => 'Ra9ba',
                'tnar' => 'رقبة',
                'ar'   => 'رقبة',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categoryBeefId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 26,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Saucisse',
                'en'   => 'Sausage',
                'tnfr' => 'Mergez',
                'tnar' => 'مرقاز',
                'ar'   => 'مرقاز',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categoryBeefId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 22,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Foie',
                'en'   => 'Liver',
                'tnfr' => 'Kebda',
                'tnar' => 'كبدة',
                'ar'   => 'كبد',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categoryBeefId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 30,
        ]);
    }

    private function productsSheep()
    {
        $categorySheepId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Mouton'")->first()->id;
        $order = 1;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Foie',
                'en'   => 'Liver',
                'tnfr' => 'Kebda',
                'tnar' => 'كبدة',
                'ar'   => 'كبد',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categorySheepId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 45,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Dawara',
                'en'   => 'Dawara',
                'tnfr' => 'Dawara 3adia',
                'tnar' => 'دوارة عادية',
                'ar'   => 'دوارة عادية',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categorySheepId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 17,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Dawara complet',
                'en'   => 'Complete dawara',
                'tnfr' => 'Dawara kemla',
                'tnar' => 'دوارة كاملة',
                'ar'   => 'دوارة كاملة',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categorySheepId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 45,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Viande',
                'en'   => 'Meat',
                'tnfr' => 'L7am',
                'tnar' => 'لحم',
                'ar'   => 'لحم',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categorySheepId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 40,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tête brulée',
                'en'   => 'Burned head',
                'tnfr' => 'Ras mchochet',
                'tnar' => 'راس مشوشط',
                'ar'   => 'رأس محروق',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categorySheepId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 17,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tête',
                'en'   => 'Head',
                'tnfr' => 'Ras',
                'tnar' => 'راس',
                'ar'   => 'رأس',
            ],
            'description' => [
                'fr'   => 'Description Français Description Français Description Français Description Français',
                'en'   => 'English Description English Description English Description English Description',
                'tnfr' => 'Description Tounsi Description Tounsi Description Tounsi Description Tounsi',
                'tnar' => 'وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي وصف تونسي',
                'ar'   => 'وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي وصف عربي',
            ],
            'photo' => '',
            'category_id' => $categorySheepId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 12,
        ]);
    }
}
