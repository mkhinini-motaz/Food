<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Spatie\Translatable\HasTranslations;

/**
 * Class Ingredient
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string photo
 * @property int    price
 * @property bool   is_visible
 *
 * @property int ingredient_category_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property IngredientCategory ingredientCategory
 * @property Collection         orders
 */
class Ingredient extends Model
{
    use HasFactory, HasTranslations;

    const ORDER_CHOICES_FIELDS = [ 'quantity' ];

    protected $dateFormat = 'U';
    public $translatable = [ 'name', 'description' ];

    /**
     * @return BelongsTo
     */
    public function ingredientCategory()
    {
        return $this->belongsTo(IngredientCategory::class);
    }

    /**
     * @return HasOneThrough
     */
    public function shop()
    {
        return $this->hasOneThrough(Shop::class, IngredientCategory::class, 'id', 'id', 'ingredient_category_id', 'shop_id');
    }

    /**
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
