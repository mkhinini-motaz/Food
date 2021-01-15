<?php

use Illuminate\Database\Seeder;
use App\Product;

class AdminsTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Admin::class, 10)->create();
    }
}
