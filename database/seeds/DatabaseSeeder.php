<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PromoCodesTableSeeder::class);
         $this->call(ClientsTableSeeder::class);
         $this->call(TransportersTableSeeder::class);
         $this->call(ShopsTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(OrdersTableSeeder::class);
         $this->call(OrderProductTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(ShopPaymentsTableSeeder::class);
        $this->call(ShopUsersTableSeeder::class);
        $this->call(TransporterPaymentsTableSeeder::class);
        $this->call(VehiculesTableSeeder::class);
    }
}
