<?php

namespace Database\Seeders;

use App\Models\Transporter;

use Illuminate\Database\Seeder;

class TransportersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        Transporter::factory()->create([
            'first_name' => 'transporter',
            'last_name' => 'transporter',
            'alias' => 'transporter',
            'phone' => '+21611111111',
            'password' => bcrypt('azerty'),
        ]);

        Transporter::factory()->count(10)->create();
    }
}
