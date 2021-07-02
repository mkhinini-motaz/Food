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
 * Class Product
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string type
 * @property string photo
 * @property int    weight
 * @property int    height
 * @property int    width
 * @property int    length
 * @property int    price
 * @property int    order
 * @property int    added_loyalty_points
 * @property bool   is_visible
 *
 * @property int category_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property Category   category
 * @property Shop       shop
 * @property Collection orders
 * @property Collection ingredientCategories
 */
class Product extends Model
{
    use HasFactory, HasTranslations;

    const TYPE_FIXED            = 1;
    const TYPE_WITH_INGREDIENTS = 2;
    const TYPES = [ self::TYPE_FIXED, self::TYPE_WITH_INGREDIENTS ];

    protected $dateFormat = 'U';

    public $translatable = [ 'name', 'description' ];

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasOneThrough
     */
    public function shop()
    {
        return $this->hasOneThrough(Shop::class, Category::class, 'id', 'id', 'category_id', 'shop_id');
    }

    /**
     * @return BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * @return BelongsToMany
     */
    public function ingredientCategories()
    {
        return $this->belongsToMany(IngredientCategory::class)
            ->withPivot([ 'min_ingredients', 'max_ingredients', 'order', 'ingredients_are_quantifiable', 'ingredients_are_billable' ])
            ->orderBy('ingredient_category_product.order');
    }
}
