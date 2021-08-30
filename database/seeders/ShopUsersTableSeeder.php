<?php

namespace Database\Seeders;

use App\Models\ShopUser;

use Illuminate\Database\Seeder;

class ShopUsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        ShopUser::factory()->create([
            'phone' => '+21611111111',
            'email' => 'shopuser@test.com',
            'password' => bcrypt('azerty'),
        ]);

        ShopUser::factory()->create([
            'first_name' => 'transporter 1',
            'last_name' => 'shop',
            'phone' => '+21622222222',
            'email' => 'shoptransporter1@test.com',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_TRANSPORTER,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'transporter 2',
            'last_name' => 'shop',
            'phone' => '+21633333333',
            'email' => 'shoptransporter2@test.com',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_TRANSPORTER,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'transporter 3',
            'last_name' => 'shop',
            'phone' => '+21644444444',
            'email' => 'shoptransporter3@test.com',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_TRANSPORTER,
        ]);
    }
}
