<?php

use Illuminate\Database\Seeder;
use App\Product;

class CategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Category::class, 10)->create();
    }
}