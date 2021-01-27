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
        $description = 'Hello, i am a category. ';

        Category::factory()->create([
            'name' => 'Eau et Boissons',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/boisson.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Conserves',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/conserves.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Pates, riz semoule, chorba',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/pates.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Boulangerie',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/boulangerie.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Surgelé',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/surgele.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Maison',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/maison.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Hygiéne',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/hygiene.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Petit déjeuner',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/petit dej.jpg',
        ]);

        Category::factory()->create([
            'name' => 'Sucrerie et chocolat',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/grocery/categorie/chocolat.jpg',
        ]);

        if (env('APP_ENV') === 'local') {
            Category::factory()->create([
                'name' => 'Test pagination category',
                'description' => str_repeat($description, rand(1, 6)),
                'photo' => '',
            ]);
        }
    }
}
