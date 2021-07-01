<?php

namespace App\Support;

use Spatie\Activitylog\Traits\LogsActivity as BaseLogsActivity;

trait LogsActivity
{
    use BaseLogsActivity;

    protected static $logAttributes         = [ '*' ];
    protected static $logAttributesToIgnore = [ 'updated_at'];
    protected static $logOnlyDirty          = true;
    protected static $submitEmptyLogs       = false;
}
