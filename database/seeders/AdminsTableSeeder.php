<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
         Admin::factory()->create([
            'first_name' => 'Motaz',
            'last_name' => 'Mkhinini',
            'phone' => '+21628852800',
            'password' => bcrypt('azerty'),
            'role' => Admin::ROLE_SUPER_ADMIN,
        ]);
    }
}
