<?php

use Illuminate\Database\Seeder;
use App\Product;

class CategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $description = 'Hello, i am a category. ';

        factory(\App\Models\Category::class)->create([
            'name' => 'Eau et Boissons',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/boisson.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Conserves',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/conserves.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Pates, riz semoule, chorba',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/pates.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Boulangerie',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/boulangerie.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Surgelé',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/surgele.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Maison',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/maison.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Hygiéne',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/hygiene.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Petit déjeuner',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/petit dej.jpg',
        ]);

        factory(\App\Models\Category::class)->create([
            'name' => 'Sucrerie et chocolat',
            'description' => str_repeat($description, rand(1, 6)),
            'photo' => 'example/categorie/chocolat.jpg',
        ]);

        if (env('APP_ENV') === 'local') {
            factory(\App\Models\Category::class)->create([
                'name' => 'Test pagination category',
                'description' => str_repeat($description, rand(1, 6)),
                'photo' => '',
            ]);
        }
    }
}
