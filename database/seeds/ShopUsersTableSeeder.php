<?php

use Illuminate\Database\Seeder;
use App\Product;

class ShopUsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Model\ShopUser::class, 10)->create();
    }
}
