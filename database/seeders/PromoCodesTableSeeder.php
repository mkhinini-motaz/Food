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
            ]);
/*
        PromoCode::factory()->create([
            'code' => 'codeclient1',
            'creator_id' => 1,
            'creator_type' => Client::class,
        ]);
        PromoCode::factory()->create([
            'code' => 'codeclient2',
            'creator_id' => 1,
            'creator_type' => Client::class,
        ]);
        PromoCode::factory()->create([
            'code' => 'codeclient3',
            'creator_id' => 1,
            'creator_type' => Client::class,
        ]);

        PromoCode::factory()->create([ 'code' => 'code' ]);
        for ($i = 0; $i <= 100; $i++) {
            PromoCode::factory()->create([ 'code' => 'code' . $i ]);
        }
*/
    }
}
