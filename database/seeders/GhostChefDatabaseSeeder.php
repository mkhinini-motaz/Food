<?php

namespace Database\Seeders;

use Database\Seeders\Ghostchef\FirstDayDataSeeder;
use Illuminate\Database\Seeder;

class GhostChefDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(AdminsTableSeeder::class);
//        $this->call(TransportersTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(ShopUsersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OptionGroupsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
//        $this->call(ClientsTableSeeder::class);
//        $this->call(PromoCodesTableSeeder::class);
//        $this->call(OrdersTableSeeder::class);
//        $this->call(LoyaltyActionSeeder::class);

//        $this->call(ShopPaymentsTableSeeder::class);
//        $this->call(TransporterPaymentsTableSeeder::class);
//        $this->call(VehiculesTableSeeder::class);

//        $this->call(FirstDayDataSeeder::class);

        $this->call(ProductsTableSeederV2::class);
    }
}
