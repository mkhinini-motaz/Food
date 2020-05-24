<?php

use Illuminate\Database\Seeder;
use App\Product;

class ClientsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Client::class)->create([
            'phone' => '+21611111111',
            'email' => 'client@test.com',
            'password' => bcrypt('azerty'),
            'is_phone_confirmed' => 1,
        ]);
    }
}
