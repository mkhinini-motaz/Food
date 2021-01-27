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
        Admin::factory()->count(10)->create();
    }
}
