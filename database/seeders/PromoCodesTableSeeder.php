<?php

namespace Database\Seeders;

use App\Models\PromoCode;

use Illuminate\Database\Seeder;

class PromoCodesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        PromoCode::factory()->count(20)->create();
    }
}
