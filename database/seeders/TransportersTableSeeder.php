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
            'first_name' => 'Motaz',
            'last_name' => 'Mkhinini',
            'alias' => 'Motaz',
            'phone' => '+21628852800',
            'password' => bcrypt('azerty'),
            'is_approved' => 1,
        ]);

        Transporter::factory()->create([
            'first_name' => 'Saif',
            'last_name' => 'Bahloul',
            'alias' => 'Saif',
            'phone' => '+21625020545',
            'password' => bcrypt('azerty'),
            'is_approved' => 1,
        ]);

    }
}
