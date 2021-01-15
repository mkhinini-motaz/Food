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
        factory(\App\Models\ShopUser::class)->create([
            'phone' => '+21611111111',
            'email' => 'shopuser@test.com',
            'password' => bcrypt('azerty'),
        ]);
    }
}
