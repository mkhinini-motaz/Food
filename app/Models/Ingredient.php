<?php

namespace App\Models;

use App\Support\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory, HasTranslations;

    const DOSE_UNIT_PIECE = 'piece';
    const DOSE_UNIT_GRAM = 'gr';
    const DOSE_UNIT_MILLILITER = 'ml';
    const DOSE_UNITS = [ self::DOSE_UNIT_GRAM, self::DOSE_UNIT_MILLILITER, self::DOSE_UNIT_PIECE ];

    public $translatable = [ 'name' ];
    protected $dateFormat = 'U';
}
