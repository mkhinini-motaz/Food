<?php

namespace App\Models;

use App\Support\Model;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $dateFormat = 'U';

    public $translatable = [ 'name', 'description' ];

    /**
     * @return HasMany
     */
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
