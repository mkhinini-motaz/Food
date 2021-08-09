<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\PromoCode;

use Illuminate\Database\Seeder;

class PromoCodesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        PromoCode::factory()->create([
            'code' => 'ghostchef',
            'reduction_amount' => 2000,
            'shop_id' => 1,
            ]);

        PromoCode::factory()->create([
            'code' => 'codeclient1',
            'shop_id' => 1,
            'creator_id' => 1,
            'creator_type' => Client::class,
        ]);
        PromoCode::factory()->create([
            'code' => 'codeclient2',
            'shop_id' => 1,
            'creator_id' => 1,
            'creator_type' => Client::class,
        ]);
        PromoCode::factory()->create([
            'code' => 'codeclient3',
            'shop_id' => 1,
            'creator_id' => 1,
            'creator_type' => Client::class,
        ]);

        PromoCode::factory()->create([ 'code' => 'code', 'shop_id' => 1 ]);
        for ($i = 0; $i <= 100; $i++) {
            PromoCode::factory()->create([ 'code' => 'code' . $i, 'shop_id' => 1 ]);
        }
    }
}
