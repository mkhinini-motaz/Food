<?php

namespace Database\Seeders\Shop;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class TitosShopCsvSeeder extends Seeder
{
    private $categoryIds = [];

    /**
     * @return void
     */
    public function run()
    {
        $open = fopen(public_path('example/titos/import.csv'), 'r');
        $previousCategoryId = -1;
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
        {
            [ $foreignId, $en, $fr, $tnfr, $tnar, $ar, $categoryNameFr, $price, $photo ] = $data;
            $categoryId = $this->categoryIdForNameFr($categoryNameFr);
            if ($categoryId !== $previousCategoryId) {
                $order = 1;
                $previousCategoryId = $categoryId;
            }
            Product::factory()->create([
                'name' => compact('en', 'fr', 'tnfr', 'tnar', 'ar'),
                'photo' => $photo,
                'category_id' => $categoryId,
                'type' => Product::TYPE_FIXED,
                'order' => $order++,
                'added_loyalty_points' => 3,
                'price' => $price,
                'foreign_id' => $foreignId ?? null,
            ]);
        }
    }

    /**
     * @param string $nameFr
     *
     * @return int
     */
    private function categoryIdForNameFr($nameFr)
    {
        if (isset($this->categoryIds[$nameFr])) {
            return $this->categoryIds[$nameFr];
        }
        $category = Category::whereHas('shop', function($query) { $query->where('name', '=', 'Tito\'s shop'); })
            ->whereRaw("JSON_EXTRACT(name, '$.fr') = '$nameFr'")
            ->first();
        if (!$category) {
            dd($nameFr);
        }

        $this->categoryIds[$nameFr] = $category->id;
        return $category->id;
    }
}
