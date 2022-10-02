<?php

namespace App\Models;

use Closure;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ActivityLog
 * @package App\Models
 *
 * @property int        id
 * @property string     log_name
 * @property string     description
 * @property int        subject_id
 * @property string     subject_type
 * @property int        causer_id
 * @property string     causer_type
 * @property Collection properties
 * @property int        shop_id
 * @property int        created_at
 * @property int        updated_at
 *
 * @property Shop shop
 *
 * @mixin IdeHelperActivityLog
 */
class ActivityLog extends Activity
{
    protected $dateFormat = 'U';

    const DESCRIPTION_SHOW          = 'show';
    const DESCRIPTION_CREATED       = 'created';
    const DESCRIPTION_UPDATED       = 'updated';
    const DESCRIPTION_DELETED       = 'deleted';
    const DESCRIPTION_FORCE_DELETED = 'force-deleted';

    // WARNING: when adding a new value, consider translating in front
    const DESCRIPTION_PRODUCT_MAKE_VISIBLE    = 'product-make-visible';
    const DESCRIPTION_PRODUCT_MAKE_INVISIBLE  = 'product-make-invisible';

    const DESCRIPTION_CATEGORY_MAKE_VISIBLE   = 'category-make-visible';
    const DESCRIPTION_CATEGORY_MAKE_INVISIBLE = 'category-make-invisible';

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @param $shopId
     *
     * @return Closure
     */
    public static function tapShopId($shopId)
    {
        return function(ActivityLog $activityLog) use ($shopId) {
            $activityLog->shop_id = $shopId;
        };
    }
}
