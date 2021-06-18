<?php

namespace Database\Seeders;

use App\Models\LoyaltyAction;
use Illuminate\Database\Seeder;

class LoyaltyActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoyaltyAction::factory()->count(20)->create([ 'client_id' => 1 ]);
    }
}
