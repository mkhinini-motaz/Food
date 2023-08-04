<?php

namespace Database\Seeders\TestShop;

use Illuminate\Database\Seeder;

class TestShopSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServicesTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(ShopUsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OptionGroupsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(IngredientSeeder::class);
    }
}
