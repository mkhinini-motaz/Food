<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * Class Category
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string photo
 * @property bool   is_visible
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property \stdClass  pivot
 * @property Collection products
 * @property Collection ingredients
 */
class IngredientCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $dateFormat = 'U';

    public $translatable = [ 'name', 'description' ];

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @param Ingredient $ingredient
     * @param array      $fields
     */
    public function attachChoicesForIngredient(Ingredient $ingredient, $fields)
    {
        if ($this->pivot->ingredients_are_quantifiable) {
            $ingredient->quantity = $fields['quantity'];
        }
    }
}
