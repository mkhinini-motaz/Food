<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Seeder;

class CategoriesTableSeederForGrocery extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $order = 1;
        $description = 'Hello, i am a category. ';

        Category::factory()->create([
            'name' => [
                'fr'   => 'Sucrerie et chocolat',
                'en'   => 'Sucrerie et chocolat',
                'tnfr' => 'Sucrerie et chocolat',
                'tnar' => 'Sucrerie et chocolat',
                'ar'   => 'Sucrerie et chocolat',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/chocolat.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Petit déjeuner',
                'en'   => 'Petit déjeuner',
                'tnfr' => 'Petit déjeuner',
                'tnar' => 'Petit déjeuner',
                'ar'   => 'Petit déjeuner',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/petit dej.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Boulangerie',
                'en'   => 'Boulangerie',
                'tnfr' => 'Boulangerie',
                'tnar' => 'Boulangerie',
                'ar'   => 'Boulangerie',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/boulangerie.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Eau et Boissons',
                'en'   => 'Eau et Boissons',
                'tnfr' => 'Eau et Boissons',
                'tnar' => 'Eau et Boissons',
                'ar'   => 'Eau et Boissons',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/boisson.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Conserves',
                'en'   => 'Conserves',
                'tnfr' => 'Conserves',
                'tnar' => 'Conserves',
                'ar'   => 'Conserves',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/conserves.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Pates, riz semoule, chorba',
                'en'   => 'Pates, riz semoule, chorba',
                'tnfr' => 'Pates, riz semoule, chorba',
                'tnar' => 'Pates, riz semoule, chorba',
                'ar'   => 'Pates, riz semoule, chorba',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/pates.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Surgelé',
                'en'   => 'Surgelé',
                'tnfr' => 'Surgelé',
                'tnar' => 'Surgelé',
                'ar'   => 'Surgelé',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/surgele.jpg',
            'order' => $order++,
            'shop_id' => 2,
            'is_visible' => 0,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Maison',
                'en'   => 'Maison',
                'tnfr' => 'Maison',
                'tnar' => 'Maison',
                'ar'   => 'Maison',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/maison.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

        Category::factory()->create([
            'name' => [
                'fr'   => 'Hygiéne',
                'en'   => 'Hygiéne',
                'tnfr' => 'Hygiéne',
                'tnar' => 'Hygiéne',
                'ar'   => 'Hygiéne',
            ],
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/hygiene.jpg',
            'order' => $order++,
            'shop_id' => 2,
        ]);

    }
}
