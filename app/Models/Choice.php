<?php

namespace App\Models;

use App\Support\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
 * @property-read Option[] options
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
        return $this->belongsToMany(Option::class);
    }
}
