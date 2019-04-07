<?php

use Illuminate\Database\Seeder;
use App\Product;

class TransportersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Transporter::class, 10)->create();
    }
}