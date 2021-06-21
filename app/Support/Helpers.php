<?php

namespace App\Support\Helpers;

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

/**
 * Check if a point is within polygon
 * @example pointInPolygon([31.111, 10.111], [35.7331,10.5589, 35.7346,10.54816, 35.73618,10.53051, 35.7345,10.5306, ...])
 *
 * @param array    $point   [ latitude, longitude ]
 * @param array    $polygon [ latitude, longitude, latitude, longitude, ... ]
 * @param int      $start
 * @param int|null $end
 *
 * @return bool
 */
function pointInPolygonFlat(array $point, array $polygon, int $start = 0, int $end = null) {
    $x = $point[0];
    $y = $point[1];
    $inside = false;
    if ($end === null) {
        $end = count($polygon);
    }

    $len = ($end - $start) / 2;
    for ($i = 0, $j = $len - 1; $i < $len; $j = $i++) {
        $xi = $polygon[$start + $i * 2 + 0];
        $yi = $polygon[$start + $i * 2 + 1];
        $xj = $polygon[$start + $j * 2 + 0];
        $yj = $polygon[$start + $j * 2 + 1];

        $intersect = (($yi > $y) !== ($yj > $y)) &&
            ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);

        if ($intersect) {
            $inside = ! $inside;
        }
    }

    return $inside;
}

/**
 * Check if a point is within polygon
 * @example pointInPolygon([31.111, 10.111], [[35.7331,10.5589],[35.7346,10.54816],[35.73618,10.53051],[35.7345,10.5306], ...])
 *
 * @param array    $point   [ latitude, longitude ]
 * @param array    $polygon [ [ latitude, longitude ], [ latitude, longitude ], ... ]
 * @param int      $start
 * @param int|null $end
 *
 * @return bool
 */
function pointInPolygonNested(array $point, array $polygon, int $start = 0, int $end = null) {
    $x = $point[0];
    $y = $point[1];
    $inside = false;

    if ($end === null) {
        $end = count($polygon);
    }

    $len = $end - $start;
    for ($i = 0, $j = $len - 1; $i < $len; $j = $i++) {
        $xi = $polygon[$i + $start][0];
        $yi = $polygon[$i + $start][1];
        $xj = $polygon[$j + $start][0];
        $yj = $polygon[$j + $start][1];

        $intersect = (($yi > $y) !== ($yj > $y)) &&
            ($x < ($xj - $xi) * ($y - $yi) / ($yj - $yi) + $xi);
        if ($intersect) {
            $inside = ! $inside;
        }
    }

    return $inside;
}

/**
 * Check if a point is within polygon
 * @example pointInPolygon([31.111, 10.111], [[35.7331,10.5589],[35.7346,10.54816],[35.73618,10.53051],[35.7345,10.5306], ...])
 *
 * @param array    $point   [ latitude, longitude ]
 * @param array    $polygon [ [ latitude, longitude ], [ latitude, longitude ], ... ]
 * @param int      $start
 * @param int|null $end
 *
 * @return bool
 */
function pointInPolygon(array $point, array $polygon, int $start = 0, int $end = null) {
    if (count($polygon) > 0 && is_array($polygon[0])) {
        return pointInPolygonNested($point, $polygon, $start, $end);
    }
    return pointInPolygonFlat($point, $polygon, $start, $end);
}
