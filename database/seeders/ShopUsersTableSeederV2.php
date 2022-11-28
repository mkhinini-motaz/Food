<?php

namespace Database\Seeders;

use App\Models\ShopUser;

use Illuminate\Database\Seeder;

class ShopUsersTableSeederV2 extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        ShopUser::factory()->create([
            'first_name' => 'Caisse',
            'last_name' => 'Caisse',
            'phone' => '+21611111111',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_SHOP_KEEPER,
        ]);

        ShopUser::factory()->create([
            'first_name' => '222',
            'last_name' => '222',
            'phone' => '+21622222222',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => '333',
            'last_name' => '333',
            'phone' => '+21633333333',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => '444',
            'last_name' => '444',
            'phone' => '+21644444444',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => '555',
            'last_name' => '555',
            'phone' => '+21655555555',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => '666',
            'last_name' => '666',
            'phone' => '+21666666666',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => '777',
            'last_name' => '777',
            'phone' => '+21777777777',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => '888',
            'last_name' => '888',
            'phone' => '+21888888888',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => '999',
            'last_name' => '999',
            'phone' => '+21999999999',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);
    }
}
