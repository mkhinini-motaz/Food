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
 * @property Collection options
 * @mixin IdeHelperOptionGroup
 */
class OptionGroup extends Model
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
     * @return BelongsToMany
     */
    public function options()
    {
        return $this->belongsToMany(Option::class)
            ->withPivot([ 'is_selected_by_default', 'price', 'order', ])
            ->orderBy('option_option_group.order');
    }

    /**
     * @return BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @param Option $option
     * @param array  $fields
     */
    public function attachChoicesForOption(Option $option, $fields)
    {
        if ($this->pivot->options_are_quantifiable) {
            $option->quantity = $fields['quantity'];
        }
    }

    /**
     * @return array
     */
    public function optionsValidationRules()
    {
        $pivot = $this->pivot;
        return [
            'min_options'              => $pivot->min_options,
            'max_options'              => $pivot->max_options,
            'options_are_billable'     => $pivot->options_are_billable,
            'options_are_quantifiable' => $pivot->options_are_quantifiable,
        ];
    }
}
