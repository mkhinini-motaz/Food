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
    }
}
