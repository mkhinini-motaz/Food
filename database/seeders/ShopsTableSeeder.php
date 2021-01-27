<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Shop::factory()->create([ 'is_approved' => true ]);
        Shop::factory()->create([ 'is_approved' => false ]);
    }
}
