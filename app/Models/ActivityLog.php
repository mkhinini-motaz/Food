<?php

namespace App\Models;

use function App\Support\Helpers\firstNameLastNameLike;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ActivityLog
 *
 * @property int        id
 * @property string     log_name
 * @property string     description
 * @property int        subject_id
 * @property string     subject_type
 * @property int        causer_id
 * @property string     causer_type
 * @property Collection properties
 * @property int        site_id
 * @property int        created_at
 * @property int        updated_at
 *
 * @package App
 */
class ActivityLog extends Activity
{
    protected $dateFormat = 'U';

    const DESCRIPTION_CREATED       = 'created';
    const DESCRIPTION_UPDATED       = 'updated';
    const DESCRIPTION_DELETED       = 'deleted';
    const DESCRIPTION_FORCE_DELETED = 'force-deleted';

    // WARNING: when adding a new value, consider translating in front
    const DESCRIPTION_ = '';

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
