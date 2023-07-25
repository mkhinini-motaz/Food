<?php

namespace App\Models;

use App\Support\Model;

use App\Support\LogsActivity;
use App\Support\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use function App\Support\Helpers\fieldsLike;

/**
 * Class Category
 * @package App\Models
 *
 * @property int    id
 * @property string name
 * @property string description
 * @property string photo
 * @property bool   is_visible
 * @property int    order
 *
 * @property int shop_id
 *
 * @property int created_at
 * @property int updated_at
 * @property int deleted_at
 *
 * @property-read Shop      shop
 * @property-read Product[] products
 *
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use HasFactory, HasTranslations, SoftDeletes, LogsActivity;

    protected $dateFormat = 'U';

    public $translatable = [ 'name', 'description' ];

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @param int $categoryId
     * @param int|null $isShopApproved
     *
     * @return Category|null
     */
    public static function findOrFail($categoryId, $isShopApproved = null)
    {
        if (in_array($isShopApproved, Shop::IS_APPROVED_VALUES)) {
            return Category::whereHas('shop', Shop::withIsApprovedEquals($isShopApproved))->findOrFail($categoryId);
        }
        return parent::findOrFail($categoryId);
    }

    /**
     * @param Builder $query
     * @param bool    $onlyVisible
     * @param string  $search
     * @param string  $orderBy
     * @param string  $orderDirection
     *
     * @return Builder
     */
    public function scopeWithProducts($query, $onlyVisible, $search, $orderBy, $orderDirection)
    {
        return $query->with([
            'products.category',
            'products' => function($productQuery) use ($onlyVisible, $search, $orderBy, $orderDirection) {
                $productQuery->with('optionGroups.options');
                if ($onlyVisible) {
                    $productQuery->where('is_visible', '=', 1);
                }

                if ($search) {
                    $productQuery->where(function ($subQuery) use ($search) {
                        $subQuery->where(fieldsLike($search, 'name'))
                            ->orWhereHas('category', function ($categoryQuery) use ($search) {
                                $categoryQuery->where(fieldsLike($search, 'name'));
                            });
                    });
                }

                if (isset($orderBy) && isset($orderDirection)) {
                    $productQuery->orderBy($orderBy, $orderDirection);
                }
            }
        ]);
    }

    /**
     */
    public function getShopId()
    {
        return $this->shop_id;
    }
}
