<?php

namespace Database\Seeders\Shop;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Shop;
use App\Models\ShopUser;
use Illuminate\Database\Seeder;

class ChahiaTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $shop = Shop::factory()->create([
            'name' => 'Chahia',
            'domain' => '',
            'service_id' => 2,
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
            'first_name' => 'Hatem',
            'last_name' => 'Ben arbia',
            'phone' => '+21697800259',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_OWNER,
            'shop_id' => $shop->id,
        ]);

        $this->categories($shop);
    }

    private function categories(Shop $shop)
    {
        $shopId = $shop->id;
        $order = 1;

        Category::factory()->create([
            'name' => [
                'en'   => 'Marinated',
                'fr'   => 'Marinée',
                'tnfr' => 'Marinée',
                'tnar' => 'ماريناي',
                'ar'   => 'ماريناي'
            ],
            'photo' => 'example/chahia/category/marinee.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Cold cuts',
                'fr'   => 'Charcuterie',
                'tnfr' => 'Charcuterie',
                'tnar' => 'اللحوم الباردة',
                'ar'   => 'اللحوم الباردة'
            ],
            'photo' => 'example/chahia/category/charcuterie.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Fresh',
                'fr'   => 'Frais',
                'tnfr' => 'Frechk',
                'tnar' => 'فرشك',
                'ar'   => 'طازج'
            ],
            'photo' => 'example/chahia/category/frais.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'en'   => 'Freezed',
                'fr'   => 'Congelé',
                'tnfr' => 'Congelé',
                'tnar' => 'مجمد',
                'ar'   => 'مجمدة'
            ],
            'photo' => 'example/chahia/category/congele.jpg',
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
            'photo' => 'example/chahia/category/oeuf.jpg',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);
    }
}
