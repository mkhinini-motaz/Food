<?php

namespace Database\Seeders\Shop;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Location;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopUser;
use Illuminate\Database\Seeder;

class FruitsLegumesSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $shop = Shop::factory()->create([
            'name' => 'Fruits légumes Brahem',
            'domain' => '',
            'service_id' => 3,
            'logo' => '',
            'is_approved' => 1,
            'min_order_price' => 3000,

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

        $location = Location::factory()->create([ 'name' => 'Fruits légumes Brahem M\'saken', 'shop_id'   => 3, 'latitude'  => 35.7351956, 'longitude' => 10.5796655, ]);

        ShopUser::factory()->create([
            'first_name' => 'Brahem',
            'last_name' => 'Brahem',
            'phone' => '+21623456789',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_OWNER,
            'shop_id' => $shop->id,
        ]);

        $this->categories();
        $this->productsFruits();
        $this->productsFruitsTropical();
        $this->productsAgrumes();
        $this->productsLegumesSurTerre();
        $this->productsLegumesSousTerre();
        $this->productsFeuilles();
        $this->productsHerbes();
    }

    /**
     *
     */
    private function categories()
    {
        $shopId = Shop::whereName('Fruits légumes Brahem')->first()->id;

        $order = 1;

        Category::factory()->create([
            'name' => [
                'fr'   => 'Fruits',
                'en'   => 'Fruit',
                'tnfr' => 'Ghalla',
                'tnar' => 'غلة',
                'ar'   => 'غلال',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Fruits tropicaux',
                'en'   => 'Tropical fruits',
                'tnfr' => 'Ghalla tropical',
                'tnar' => 'غلة تروبيكال',
                'ar'   => 'غلال استوائية',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Agrumes',
                'en'   => 'Citrus',
                'tnfr' => 'Bordgen',
                'tnar' => 'بردجان',
                'ar'   => 'حمضيات',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Légumes sur terre',
                'en'   => 'Overground vegetables',
                'tnfr' => '5odhra men fo9 el9a3',
                'tnar' => 'خضرة من فوق القاع',
                'ar'   => 'خضر من فوق الأرض',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Légumes sous terre',
                'en'   => 'Underground vegetables',
                'tnfr' => '5odhra men ta7t el9a3',
                'tnar' => 'خضرة من تحت القاع',
                'ar'   => 'خضر من تحت الأرض',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Feuilles',
                'en'   => 'Leaves',
                'tnfr' => 'Wre9',
                'tnar' => 'أوراق',
                'ar'   => 'أوراق',
            ],
            'photo' => '',
            'is_visible' => 1,
            'shop_id' => $shopId,
            'order' => $order++,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Herbes',
                'en'   => 'Herbs',
                'tnfr' => 'Herbes',
                'tnar' => 'أعشاب',
                'ar'   => 'أعشاب',
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
    private function productsFeuilles()
    {
        $categoryFeuillesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Feuilles'")->first()->id;
        $order = 1;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Fenouil',
                'en'   => 'Fennel',
                'tnfr' => 'Besbes',
                'tnar' => 'بسباس',
                'ar'   => 'شمر',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Laitue romaine',
                'en'   => 'Romaine lettuce',
                'tnfr' => '5ass',
                'tnar' => 'خس',
                'ar'   => 'خس',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Laitue',
                'en'   => 'Lettuce',
                'tnfr' => 'Laitue',
                'tnar' => 'خس',
                'ar'   => 'خس',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Choux vert',
                'en'   => 'Green cabbage',
                'tnfr' => 'Kromb a5dhar',
                'tnar' => 'كرمب أخضر',
                'ar'   => 'كرمب أخضر',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Choux rouge',
                'en'   => 'Red cabbage',
                'tnfr' => 'Kromb a7mar',
                'tnar' => 'كرمب أحمر',
                'ar'   => 'كرمب أحمر',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Broccoli',
                'en'   => 'Brocoli',
                'tnfr' => 'Brouklou',
                'tnar' => 'بروكلو',
                'ar'   => 'بروكلي',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1300,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Broccolini',
                'en'   => 'Brocolini',
                'tnfr' => 'Broukoulin',
                'tnar' => 'بروكولين',
                'ar'   => 'بروكوليني',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Artichaut rouge',
                'en'   => 'Red artichoke',
                'tnfr' => 'Ganneria 7amra',
                'tnar' => 'جنارية حمرة',
                'ar'   => 'خرشوف أحمر',
            ],
            'photo' => '',
            'category_id' => $categoryFeuillesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

    }

    /**
     *
     */
    private function productsLegumesSurTerre()
    {
        $categoryLegumesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Légumes sur terre'")->first()->id;
        $order = 1;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Piment chaabani',
                'en'   => 'Chaabani peper',
                'tnfr' => 'Felfel cha3bani',
                'tnar' => 'فلفل شعباني',
                'ar'   => 'فلفل شعباني',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Piment baklouti',
                'en'   => 'Baklouti peper',
                'tnfr' => 'Felfel ba9louti',
                'tnar' => 'فلفل بقلوطي',
                'ar'   => 'فلفل بقلوطي',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 5000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Piment chaabani rouge',
                'en'   => 'Red chaabani peper',
                'tnfr' => 'Felfel cha3bani a7mar',
                'tnar' => 'فلفل شعباني أحمر',
                'ar'   => 'فلفل شعباني أحمر',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 6300,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Piment doux',
                'en'   => 'Soft peper',
                'tnfr' => 'Felfel 7lou',
                'tnar' => 'فلفل حلو',
                'ar'   => 'فلفل حلو',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 4000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Piment carré',
                'en'   => 'Square peper',
                'tnfr' => 'Felfel carré',
                'tnar' => 'فلفل مربع',
                'ar'   => 'فلفل مربع',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 7000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Concombre',
                'en'   => 'Cucumber',
                'tnfr' => '5yar',
                'tnar' => 'خيار',
                'ar'   => 'خيار',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 4000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Concombre',
                'en'   => 'Cucumber',
                'tnfr' => 'Fa9ous',
                'tnar' => 'فقوس',
                'ar'   => 'خيار',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 5000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Aubergine',
                'en'   => 'Eggplant',
                'tnfr' => 'Badhenjan',
                'tnar' => 'باذنجان',
                'ar'   => 'باذنجان',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3800,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Citrouille',
                'en'   => 'Pumpkin',
                'tnfr' => '9ra3 boutazina',
                'tnar' => 'قرع بوتزينة',
                'ar'   => 'يقطين بوتزينة',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 4500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Citrouille',
                'en'   => 'Pumpkin',
                'tnfr' => '9ra3 batati',
                'tnar' => 'قرع بطاطي',
                'ar'   => 'يقطين بطاطي',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Citrouille rouge',
                'en'   => 'Red pumpkin',
                'tnfr' => '9ra3 a7mar',
                'tnar' => 'قرع أحمر',
                'ar'   => 'يقطين أحمر',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Haricots verts',
                'en'   => 'Green beans',
                'tnfr' => 'Loubya 5adhra',
                'tnar' => 'لوبيا خضراء',
                'ar'   => 'لوبيا خضراء',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tomate',
                'en'   => 'Tomato',
                'tnfr' => 'Tmatem',
                'tnar' => 'طماطم',
                'ar'   => 'طماطم',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Tomate cerise',
                'en'   => 'Cherry tomato',
                'tnfr' => 'Tomate cerise',
                'tnar' => 'طماطم سيريز',
                'ar'   => 'طماطم الكرز',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pois',
                'en'   => 'Pea',
                'tnfr' => 'Jelbana',
                'tnar' => 'جلبانة',
                'ar'   => 'بازيلاء',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 4000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Haricot',
                'en'   => 'Bean',
                'tnfr' => 'Foul',
                'tnar' => 'فول',
                'ar'   => 'فول',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2000,
        ]);
    }

    /**
     *
     */
    private function productsLegumesSousTerre()
    {
        $categoryLegumesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Légumes sous terre'")->first()->id;
        $order = 1;


        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme de terre',
                'en'   => 'Potato',
                'tnfr' => 'Batata',
                'tnar' => 'بطاطا',
                'ar'   => 'بطاطا',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1800,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme de terre sucrée',
                'en'   => 'Sweet potato',
                'tnfr' => 'Batata 7louwa',
                'tnar' => 'بطاطا حلوة',
                'ar'   => 'بطاطا حلوة',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 7000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Petit pomme de terre',
                'en'   => 'Small potato',
                'tnfr' => 'Batata jwayda',
                'tnar' => 'بطاطا جويدة',
                'ar'   => 'بطاطا صغيرة',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 800,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Oignon',
                'en'   => 'Onion',
                'tnfr' => 'Bsal reb3i',
                'tnar' => 'بصل ربعي',
                'ar'   => 'بصل ربعي',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Oignon blanc',
                'en'   => 'White onion',
                'tnfr' => 'Bsal abyadh',
                'tnar' => 'بصل أبيض',
                'ar'   => 'بصل أبيض',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Oignon rouge',
                'en'   => 'Red onion',
                'tnfr' => 'Bsal a7mar',
                'tnar' => 'بصل أحمر',
                'ar'   => 'بصل أحمر',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Carotte',
                'en'   => 'Carrot',
                'tnfr' => 'Sfeneria arbi',
                'tnar' => 'سفنارية عربي',
                'ar'   => 'جزر',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Carotte',
                'en'   => 'Carrot',
                'tnfr' => 'Sfeneria',
                'tnar' => 'سفنارية',
                'ar'   => 'جزر',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Betterave',
                'en'   => 'Beet',
                'tnfr' => 'Betrave',
                'tnar' => 'بتراف',
                'ar'   => 'شمندر',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Navet',
                'en'   => 'Turnip',
                'tnfr' => 'Left rous',
                'tnar' => 'لفت روص',
                'ar'   => 'لفت',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ail',
                'en'   => 'Garlic',
                'tnfr' => 'Thom',
                'tnar' => 'ثوم',
                'ar'   => 'ثوم',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 10000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Radis',
                'en'   => 'Radish',
                'tnfr' => 'Fjel',
                'tnar' => 'فجل',
                'ar'   => 'فجل',
            ],
            'photo' => '',
            'category_id' => $categoryLegumesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1000,
        ]);
    }

    /**
     *
     */
    private function productsAgrumes()
    {
        $categoryArgumesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Agrumes'")->first()->id;
        $order = 1;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange baldi',
                'en'   => 'Orange baldi',
                'tnfr' => 'Lim baldi',
                'tnar' => 'ليم بلدي',
                'ar'   => 'برتقال بلدي',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange chenwa',
                'en'   => 'Orange chenwa',
                'tnfr' => 'Lim chenwa',
                'tnar' => 'ليم شنوة',
                'ar'   => 'برتقال شنوة',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 4500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange thomson',
                'en'   => 'Orange thomson',
                'tnfr' => 'Lim tomson',
                'tnar' => 'ليم طمسن',
                'ar'   => 'برتقال طومسون',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange sanguinelli',
                'en'   => 'Sanguinelli orange',
                'tnfr' => 'Lim sa9asli',
                'tnar' => 'ليم صقصلى',
                'ar'   => 'برتقال صقصلى',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3400,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange chami',
                'en'   => 'Chami orange',
                'tnfr' => 'Lim chami',
                'tnar' => 'ليم شامي',
                'ar'   => 'برتقال شامي',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange douce',
                'en'   => 'Sweet orange',
                'tnfr' => 'Lim 7lou',
                'tnar' => 'ليم حلو',
                'ar'   => 'برتقال حلو',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange à jus',
                'en'   => 'Orange for juice',
                'tnfr' => 'Lim chroubou',
                'tnar' => 'ليم شروبو',
                'ar'   => 'برتقال شروبو',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange amère',
                'en'   => 'Bitter orange',
                'tnfr' => 'Lim 9ares',
                'tnar' => 'ليم قارص',
                'ar'   => 'برتقال قارص',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Orange pomélos',
                'en'   => 'Orange pomelos',
                'tnfr' => 'Lim zenba3',
                'tnar' => 'ليم زنباع',
                'ar'   => 'برتقال زنباع',
            ],
            'photo' => '',
            'category_id' => $categoryArgumesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2000,
        ]);
    }
    /**
     *
     */
    private function productsFruitsTropical()
    {
        $categoryFruitsTropicalId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Fruits tropicaux'")->first()->id;
        $order = 1;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Banane',
                'en'   => 'Banana',
                'tnfr' => 'Banane',
                'tnar' => 'بنان',
                'ar'   => 'موز',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsTropicalId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 8500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Ananas',
                'en'   => 'Ananas',
                'tnfr' => 'Ananas',
                'tnar' => 'أناناس',
                'ar'   => 'أناناس',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsTropicalId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 10000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Manga',
                'en'   => 'Manga',
                'tnfr' => 'Manga',
                'tnar' => 'مانجا',
                'ar'   => 'مانجا',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsTropicalId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 13000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Avocat',
                'en'   => 'Avocado',
                'tnfr' => 'Avocado',
                'tnar' => 'أفوكادو',
                'ar'   => 'أفوكادو',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsTropicalId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 6000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Kiwi',
                'en'   => 'Kiwi',
                'tnfr' => 'Kiwi',
                'tnar' => 'كيوي',
                'ar'   => 'كيوي',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsTropicalId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 500,
        ]);
    }

    /**
     *
     */
    private function productsFruits()
    {
        $order = 1;
        $categoryFruitsId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Fruits'")->first()->id;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Fraise',
                'en'   => 'Strawberry',
                'tnfr' => 'Fraise',
                'tnar' => 'فراز',
                'ar'   => 'فراولة',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 8000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Poire',
                'en'   => 'Pear',
                'tnfr' => 'Nzas',
                'tnar' => 'نزاص',
                'ar'   => 'إجاص',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 10000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Coing',
                'en'   => 'Quince',
                'tnfr' => 'Sfarjal',
                'tnar' => 'سفرجل',
                'ar'   => 'سفرجل',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Datte',
                'en'   => 'Date',
                'tnfr' => 'Degla',
                'tnar' => 'دجلة',
                'ar'   => 'دجلة',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 12000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Kenticha',
                'en'   => 'Kenticha',
                'tnfr' => 'Kenticha',
                'tnar' => 'كنتيشة',
                'ar'   => 'كنتيشة',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 3000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Datte',
                'en'   => 'Date',
                'tnfr' => 'Tmar',
                'tnar' => 'تمر',
                'ar'   => 'تمر',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 5000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme importé',
                'en'   => 'Imported apple',
                'tnfr' => 'Toffe7 importé',
                'tnar' => 'تفاح مستورد',
                'ar'   => 'تفاح مستورد',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 15000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme rouge grand',
                'en'   => 'Big red apple',
                'tnfr' => 'Toffe7 a7mar kbir',
                'tnar' => 'تفاح أحمر كبير',
                'ar'   => 'تفاح أحمر كبير',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 10000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme rouge moyen',
                'en'   => 'Medium red apple',
                'tnfr' => 'Toffe7 a7mar metwassat',
                'tnar' => 'تفاح أحمر متوسط',
                'ar'   => 'تفاح أحمر متوسط',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 8000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme rouge petit',
                'en'   => 'Little red apple',
                'tnfr' => 'Toffe7 a7mar sghir',
                'tnar' => 'تفاح أحمر صغير',
                'ar'   => 'تفاح أحمر صغير',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 4000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme vert grand',
                'en'   => 'Big green apple',
                'tnfr' => 'Toffe7 a5dhar kbir',
                'tnar' => 'تفاح أخضر كبير',
                'ar'   => 'تفاح أخضر كبير',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 10000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme vert moyen',
                'en'   => 'Medium green apple',
                'tnfr' => 'Toffe7 a5dhar metwassat',
                'tnar' => 'تفاح أخضر متوسط',
                'ar'   => 'تفاح أخضر متوسط',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 8000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Pomme vert petit',
                'en'   => 'Little green apple',
                'tnfr' => 'Toffe7 a5dhar sghir',
                'tnar' => 'تفاح أخضر صغير',
                'ar'   => 'تفاح أخضر صغير',
            ],
            'photo' => '',
            'category_id' => $categoryFruitsId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 4000,
        ]);
    }

    /**
     *
     */
    private function productsHerbes()
    {
        $categoryHerbesId = Category::whereRaw("JSON_EXTRACT(name, '$.fr') = 'Herbes'")->first()->id;
        $order = 1;

        Product::factory()->create([
            'name' => [
                'fr'   => 'Bette',
                'en'   => 'Chard',
                'tnfr' => 'Sal9',
                'tnar' => 'سلق',
                'ar'   => 'سلق',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Persil',
                'en'   => 'Parsley',
                'tnfr' => 'Ma3dnous',
                'tnar' => 'معدنوس',
                'ar'   => 'بَقدونس',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Céleri',
                'en'   => 'Celery',
                'tnfr' => 'Klafes',
                'tnar' => 'كلافص',
                'ar'   => 'كرفس',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Feuilles de navet',
                'en'   => 'Turnip leaves',
                'tnfr' => 'Left morchen',
                'tnar' => 'لفت مرشان',
                'ar'   => 'أوراق لفت',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 800,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Épinard',
                'en'   => 'Spinach',
                'tnfr' => 'Sebna5',
                'tnar' => 'سبناخ',
                'ar'   => 'سبناخ',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 5000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Cresson',
                'en'   => 'Watercress',
                'tnfr' => 'Jerjir',
                'tnar' => 'جرجير',
                'ar'   => 'جرجير',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1200,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Basilic',
                'en'   => 'Basel',
                'tnfr' => '7ba9',
                'tnar' => 'حبق',
                'ar'   => 'ريحان',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 40000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Menthe',
                'en'   => 'Mint',
                'tnfr' => 'Na3ne3',
                'tnar' => 'نعناع',
                'ar'   => 'نعناع',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 600,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Feuilles de fenouil',
                'en'   => 'Fennel leaves',
                'tnfr' => 'Besbes farfoucha',
                'tnar' => 'بسباس فرفوشة',
                'ar'   => 'أوراق بسباس',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 800,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Aneth',
                'en'   => 'Dill',
                'tnfr' => 'Chebt',
                'tnar' => 'شبت',
                'ar'   => 'شبت',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 1000,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Jedra',
                'en'   => 'Jedra',
                'tnfr' => 'Jedra',
                'tnar' => 'جدرة',
                'ar'   => 'جدرة',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Poireaux',
                'en'   => 'Leeks',
                'tnfr' => 'Korath',
                'tnar' => 'كراث',
                'ar'   => 'كراث',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_WEIGHTABLE,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2500,
        ]);

        Product::factory()->create([
            'name' => [
                'fr'   => 'Artichaut',
                'en'   => 'Artichoke',
                'tnfr' => '5orchof',
                'tnar' => 'خرشف',
                'ar'   => 'خرشف',
            ],
            'photo' => '',
            'category_id' => $categoryHerbesId,
            'type' => Product::TYPE_FIXED,
            'order' => $order++,
            'added_loyalty_points' => 3,
            'price' => 2000,
        ]);

    }
}
