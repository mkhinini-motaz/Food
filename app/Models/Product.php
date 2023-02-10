<?php

namespace App\Models;

use App\Support\HasTranslations;
use App\Support\Model;
use App\Support\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string type
 * @property string brand
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
 * @property Collection optionGroups
 * @property Collection options
 * @property Collection defaultOptions
 * @mixin IdeHelperProduct
 */
class Product extends Model
{
    use SoftDeletes, HasFactory, HasTranslations, LogsActivity;

    const TYPE_FIXED        = 1;
    const TYPE_WITH_OPTIONS = 2;
    const TYPES             = [ self::TYPE_FIXED, self::TYPE_WITH_OPTIONS, ];

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
    public function optionGroups()
    {
        return $this->belongsToMany(OptionGroup::class)
            ->withPivot([ 'min_options', 'max_options', 'order', 'options_are_quantifiable', 'options_are_billable' ])
            ->orderBy('option_group_product.order');
    }

    /**
     * @return HasMany
     */
    public function options()
    {
        $instance = $this->newRelatedInstance(Option::class);

        return $this->newHasMany($instance->newQuery(), $this, 'product_id', 'id')
            ->join('option_option_group', 'option_option_group.option_id', '=', 'options.id')
            ->join('option_groups', 'option_option_group.option_group_id', '=', 'option_groups.id')
            ->join('option_group_product', 'option_group_product.option_group_id', '=', 'option_groups.id')
            ->selectRaw('options.*, option_group_product.product_id')
            ->orderByRaw('option_group_product.order, option_option_group.order');
    }

    /**
     * @return HasMany
     */
    public function defaultOptions()
    {
        return $this->options()
            ->where('is_selected_by_default', '=', 1);
    }

    /**
     * @return BelongsToMany
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot([ 'dose', ]);
    }

    /**
     * Appends additional data to the activity log
     *
     * @param ActivityLog $activityLog
     * @param string      $eventName
     */
    public function tapActivity(ActivityLog $activityLog, string $eventName)
    {
        $activityLog->shop_id = $this->category->shop_id;
    }
}
