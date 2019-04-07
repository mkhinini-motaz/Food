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
        factory(\App\Client::class, 100)->create();
    }
}
