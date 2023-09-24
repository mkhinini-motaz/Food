<?php

namespace Database\Seeders\Shop;

use App\Models\Category;
use App\Models\Shop;
use App\Models\ShopUser;
use Illuminate\Database\Seeder;

class TitosShopSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $shop = Shop::factory()->create([
            'name' => 'Tito\'s shop',
            'domain' => '',
            'service_id' => 3,
            'logo' => '',
            'is_approved' => 1,
            'min_order_price' => 5000,
            'latitude'  => 35.726547,
            'longitude' => 10.583929,
            'working_hours' => [
                0 => [ 'start' => '07:00', 'end' => '22:00' ],
                1 => [ 'start' => '07:00', 'end' => '22:00' ],
                2 => [ 'start' => '07:00', 'end' => '22:00' ],
                3 => [ 'start' => '07:00', 'end' => '22:00' ],
                4 => [ 'start' => '07:00', 'end' => '22:00' ],
                5 => [ 'start' => '07:00', 'end' => '22:00' ],
                6 => [ 'start' => '07:00', 'end' => '22:00' ],
            ],
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Riadh',
            'last_name' => 'Azabi',
            'phone' => '+21625983196',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_OWNER,
            'shop_id' => $shop->id,
        ]);

        $this->categories($shop);
    }

    /**
     *
     */
    private function categories(Shop $shop)
    {
        $shopId = $shop->id;
        $order = 1;

        Category::factory()->create([
            'name' => [
                'en'   => 'Water',
                'fr'   => 'Eau',
                'tnfr' => 'Mi',
                'tnar' => 'مي',
                'ar'   => 'ماء'
            ],
            'photo' => 'example/titos/category/mi.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Soda',
                'fr'   => 'Boissons gazeuses',
                'tnfr' => 'Gazouz',
                'tnar' => 'ڨازوز',
                'ar'   => 'مشروبات غازية'
            ],
            'photo' => 'example/titos/category/gazouz.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Juice',
                'fr'   => 'Jus',
                'tnfr' => 'Jus',
                'tnar' => 'عصير',
                'ar'   => 'عصير'
            ],
            'photo' => 'example/titos/category/jus.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Diapers',
                'fr'   => 'Couche',
                'tnfr' => 'Couche',
                'tnar' => 'كوش',
                'ar'   => 'حفاضات'
            ],
            'photo' => 'example/titos/category/couche.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Cleaning products',
                'fr'   => 'Produits de nettoyage',
                'tnfr' => 'Mawad tandhif',
                'tnar' => 'مواد تنظيف',
                'ar'   => 'مواد تنظيف'
            ],
            'photo' => 'example/titos/category/mawadtandhif.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Paper towel',
                'fr'   => 'Papier serviette',
                'tnfr' => 'Mochoir',
                'tnar' => 'مشوار',
                'ar'   => 'مناشف ورقية'
            ],
            'photo' => 'example/titos/category/mouchoir.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Milk',
                'fr'   => 'Lait',
                'tnfr' => 'Hlib',
                'tnar' => 'حليب',
                'ar'   => 'حليب'
            ],
            'photo' => 'example/titos/category/7lib.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Butter',
                'fr'   => 'Beurre',
                'tnfr' => 'Zebda',
                'tnar' => 'زبدة',
                'ar'   => 'زبدة'
            ],
            'photo' => 'example/titos/category/zebda.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Eggs',
                'fr'   => 'Oeufs',
                'tnfr' => '3dham',
                'tnar' => 'عضم',
                'ar'   => 'بيض'
            ],
            'photo' => 'example/titos/category/3dham.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Yogurt',
                'fr'   => 'Yaourt',
                'tnfr' => 'Yoghort',
                'tnar' => 'ياغرط',
                'ar'   => 'زبادي'
            ],
            'photo' => 'example/titos/category/yogurt.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Pasta',
                'fr'   => 'Pates',
                'tnfr' => 'Ma9arouna',
                'tnar' => 'ماقرونة',
                'ar'   => 'معكرونة'
            ],
            'photo' => 'example/titos/category/ma9arouna.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Flour',
                'fr'   => 'Farine',
                'tnfr' => 'Farina',
                'tnar' => 'فارينة',
                'ar'   => 'فارينة'
            ],
            'photo' => 'example/titos/category/farina.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Biscuit',
                'fr'   => 'Biscuit',
                'tnfr' => 'Bachkoutou',
                'tnar' => 'بشكوطو',
                'ar'   => 'بسكويت'
            ],
            'photo' => 'example/titos/category/biscuit.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Cake',
                'fr'   => 'Cake',
                'tnfr' => 'Cake',
                'tnar' => 'كايك',
                'ar'   => 'كايك'
            ],
            'photo' => 'example/titos/category/cake.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Choclate',
                'fr'   => 'Chocolat',
                'tnfr' => 'Choklata',
                'tnar' => 'شوكلاتة',
                'ar'   => 'شوكولاتة'
            ],
            'photo' => 'example/titos/category/choclate.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Coffee',
                'fr'   => 'Café',
                'tnfr' => '9ahwa',
                'tnar' => 'قهوة',
                'ar'   => 'قهوة'
            ],
            'photo' => 'example/titos/category/cafe.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Canned goods',
                'fr'   => 'Conserves',
                'tnfr' => 'Conserves',
                'tnar' => 'البضائع المعلبة',
                'ar'   => 'البضائع المعلبة'
            ],
            'photo' => 'example/titos/category/can.png',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Oil',
                'fr'   => 'Huile',
                'tnfr' => 'Zit',
                'tnar' => 'زيت',
                'ar'   => 'زيت'
            ],
            'photo' => 'example/titos/category/zit.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Phone credit',
                'fr'   => 'Recharge téléphone',
                'tnfr' => 'Tiquéet',
                'tnar' => 'تيكيات',
                'ar'   => 'رصيد هاتفي'
            ],
            'photo' => 'example/titos/category/recharge.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);
    }
}
