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
            'first_name' => 'Moatez',
            'last_name' => 'Mkhinini',
            'phone' => '+21628852800',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_OWNER,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Hamouda',
            'last_name' => 'Bach',
            'phone' => '+21625833505',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_MASTER_CHEF,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Radhwan',
            'last_name' => 'Mkhinini',
            'phone' => '+21620391686',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_SHOP_KEEPER,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Marwan',
            'last_name' => 'Gazeh',
            'phone' => '+21650110813',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Atef',
            'last_name' => 'Bouhlel',
            'phone' => '+21652906110',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Safa',
            'last_name' => 'Soussi',
            'phone' => '+21611111111',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_COOK,
        ]);

        ShopUser::factory()->create([
            'first_name' => 'Wadia',
            'last_name' => 'Thaalbi',
            'phone' => '+21628113967',
            'password' => bcrypt('azerty'),
            'role' => ShopUser::ROLE_TRANSPORTER,
        ]);
    }
}
