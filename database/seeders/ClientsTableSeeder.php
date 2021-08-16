<?php

namespace Database\Seeders;

use App\Models\Client;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Client::factory()->create([
            'first_name' => 'user',
            'last_name' => 'user',
            'phone' => '+21611111111',
            'email' => 'client@test.com',
            'password' => bcrypt('azerty'),
            'is_phone_confirmed' => 1,
            'loyalty_points_count' => 10000,
        ]);

        Client::factory()->create([
            'first_name' => 'user 2',
            'last_name' => 'user 2',
            'phone' => '+21622222222',
            'email' => 'client2@test.com',
            'password' => bcrypt('azerty'),
            'is_phone_confirmed' => 1,
        ]);

        Client::factory()->create([
            'first_name' => 'user 3',
            'last_name' => 'user 3',
            'phone' => '+21633333333',
            'email' => 'client3@test.com',
            'password' => bcrypt('azerty'),
            'is_phone_confirmed' => 1,
        ]);
    }
}
