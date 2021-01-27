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
            'phone' => '+21611111111',
            'email' => 'client@test.com',
            'password' => bcrypt('azerty'),
            'is_phone_confirmed' => 1,
        ]);
    }
}
