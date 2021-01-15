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
        factory(\App\Models\Shop::class)->create([ 'is_approved' => true ]);
        factory(\App\Models\Shop::class)->create([ 'is_approved' => false ]);
    }
}
