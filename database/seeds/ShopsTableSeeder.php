<?php

use Illuminate\Database\Seeder;
use App\Product;

class ShopsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Shop::class, 2)->create();
    }
}
