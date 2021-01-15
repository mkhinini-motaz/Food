<?php

use Illuminate\Database\Seeder;
use App\Product;

class PromoCodesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PromoCode::class, 20)->create();
    }
}
