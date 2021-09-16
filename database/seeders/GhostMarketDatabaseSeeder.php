<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GhostMarketDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeederForGrocery::class);
        $this->call(ProductsTableSeederForGrocery::class);
    }
}
