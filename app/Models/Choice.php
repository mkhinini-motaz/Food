<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * Class Choice
 * @package App\Models
 *
 * @property int id
 * @property int product_count
 * @property int order_id
 * @property int product_id
 *
 * @property int created_at
 * @property int updated_at
 *
 * @property-read Product  product
 * @property-read Collection options
 */
class Choice extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsToMany
     */
    public function options()
    {
        return $this->belongsToMany(Option::class)
            ->withPivot(Option::ORDER_CHOICES_FIELDS)
            ->orderByPivot('choice_option.id');
    }

    /**
     * @param string $optionsSeparator
     * @param string $optionsPrefix
     *
     * @return string
     */
    public function printableForm($optionsSeparator = "\n", $optionsPrefix = '.. ')
    {
        $product = $this->product;
        $result  = '- ' . $this->product_count . ' x ';
        $result .= $product->category->getTranslation('name', 'tnfr') .
            ' - ' . $product->getTranslation('name', 'tnfr');

        $result .= ' "' . substr($product->price, 0, -3) .
            ',' . substr($product->price, -3, 3) . "\"\n";

        return $result . $this->optionsPrintableForm($optionsSeparator, $optionsPrefix);
    }

    /**
     * @param string $optionsSeparator
     * @param string $optionsPrefix
     *
     * @return string
     */
    public function optionsPrintableForm($optionsSeparator = "\n", $optionsPrefix = '.. ')
    {
        if ($this->product->type !== Product::TYPE_WITH_OPTIONS) {
            return "\n";
        }

        $chosenOptionsIds  = $this->options->keyBy('id')
            ->keys()
            ->toArray();
        $defaultOptionsIds = $this->product->defaultOptions
            ->keyBy('id')
            ->keys()
            ->toArray();

        $addedOptions = array_diff($chosenOptionsIds, $defaultOptionsIds);
        $removedOptions = array_diff($defaultOptionsIds, $chosenOptionsIds);

        $changedDefaultOptionsIds = $this->options->filter(function($option) use ($addedOptions) {
            return ! in_array($option->pivot->quantity, [0, 2]) && ! in_array($option->id, $addedOptions);
        })->keyBy('id')
            ->keys()
            ->toArray();

        $countAddedOptions             = count($addedOptions);
        $countRemovedOptions           = count($removedOptions);
        $countChangedDefaultOptionsIds = count($changedDefaultOptionsIds);
        $countCounts = $countAddedOptions + $countRemovedOptions + $countChangedDefaultOptionsIds;

        if (0 === $countCounts) {
            return "\n";
        } else if (4 >= $countCounts) {
            $addedAndChangedOptionIds = array_merge($addedOptions, $changedDefaultOptionsIds);
            $options = $this->product->defaultOptions->whereIn('id', $removedOptions)
                ->merge($this->options->whereIn('id', $addedAndChangedOptionIds));
        } else {
            $options = $this->options;
        }

        $result = '';
        /** @var Option $option */
        foreach ($options as $option) {
            if (in_array($option->id, $removedOptions)) {
                $result .= $optionsPrefix . 'XX ';
            } else {
                $result .= $optionsPrefix . str_repeat('+', $option->pivot->quantity ?? 0) . ' ';
            }
            $result .= $option->getTranslation('name', 'tnfr');

            if (isset($option->pivot) && $option->pivot->price) {
                $result .= ' "' . substr($option->pivot->price, 0, -3) . ',' .
                    substr($option->pivot->price, -3, 3) . '"';
            }
            $result .= $optionsSeparator;
        }

        $result = preg_replace('/' . $optionsSeparator . '$/', '', $result);

        return $result . "\n\n";
    }
}
