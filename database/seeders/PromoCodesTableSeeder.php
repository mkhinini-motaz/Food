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
        PromoCode::factory()->create([ 'code' => 'code', 'shop_id' => 1 ]);
        for ($i = 0; $i <= 100; $i++) {
            PromoCode::factory()->create([ 'code' => 'code' . $i, 'shop_id' => 1 ]);
        }
    }
}
