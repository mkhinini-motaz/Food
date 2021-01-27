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
    }
}
