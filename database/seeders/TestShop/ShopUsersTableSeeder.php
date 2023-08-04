<?php

namespace Database\Seeders\TestShop;

use App\Models\Shop;
use App\Models\ShopUser;

use Illuminate\Database\Seeder;

class ShopUsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $shopId = Shop::where('name', '=', 'Test shop')->first()->id;

        ShopUser::factory()->create([
            'first_name' => 'Wael',
            'last_name' => 'Wael',
            'phone' => '+21697828405',
            'password' => bcrypt('123456'),
            'role' => ShopUser::ROLE_OWNER,
            'shop_id' => $shopId,
        ]);
    }
}
