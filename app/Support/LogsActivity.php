<?php

namespace App\Support;

use App\Models\ActivityLog;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity as BaseLogsActivity;

trait LogsActivity
{
    use BaseLogsActivity;

    /**
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->logExcept([ 'updated_at'])
            ->dontSubmitEmptyLogs();
    }

    /**
     * @param ActivityLog $activityLog
     * @param string      $eventName
     */
    public function tapActivity(ActivityLog $activityLog, string $eventName)
    {
        $this->tapShopId($activityLog);

        if ($eventName === ActivityLog::DESCRIPTION_UPDATED) {
            $this->removeUnchangedTranslationValues($activityLog);
        }

    }

    /**
     * @param ActivityLog $activityLog
     */
    public function removeUnchangedTranslationValues(ActivityLog $activityLog)
    {
        $attributesValues = $activityLog->properties['attributes'];
        $oldValues = $activityLog->properties['old'];
        $attributes = [];
        $old = [];
        foreach ($attributesValues as $attribute => $value) {
            if (! $this->isTranslatableAttribute($attribute)) {
                $attributes[$attribute] = $value;
                $old[$attribute] = $oldValues[$attribute];
                continue;
            }

            [$attributesTranslations, $oldTranslations] = $this->dirtyTranslations($value, $oldValues[$attribute]);
            $attributes[$attribute] = $attributesTranslations;
            $old[$attribute] = $oldTranslations;
        }

        $activityLog->properties = compact('attributes', 'old');
    }

    /**
     * @param array $value
     * @param array $oldValue
     *
     * @return array[]
     */
    private function dirtyTranslations($value, $oldValue)
    {
        $attributesTranslations = [];
        $oldTranslations = [];
        foreach ($value as $langKey => $translation) {
            $oldTranslation = $oldValue[$langKey];
            if ($translation !== $oldTranslation) {
                $attributesTranslations[$langKey] = $translation;
                $oldTranslations[$langKey] = $oldValue[$langKey];
            }
        }

        return [$attributesTranslations, $oldTranslations];
    }

    /**
     * @param ActivityLog $activityLog
     */
    public function tapShopId(ActivityLog $activityLog)
    {
        $activityLog->shop_id = $this->getShopId();
    }

    /**
     * @return mixed
     */
    public abstract function getShopId();
}
