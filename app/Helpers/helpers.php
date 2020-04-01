<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Imagick;
use ImagickException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * Query builder helper for the Like operator
 *
 * Return value can be used as follow :
 *     \Illuminate\Database\Query\Builder::where(fieldsLike(...))
 *     \Illuminate\Database\Eloquent\Model::with(['relationName' => fieldsLike(...)])
 *
 * @param string $term
 * @param array ...$fields
 *
 * @return \Closure
 */
function fieldsLike($term, ...$fields)
{
    return function ($query) use ($term, $fields) {
        foreach ($fields as $field) {
            $query->orWhere($field, 'LIKE', '%' . $term . '%');
        }
    };
}
