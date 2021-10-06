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
 * Query builder helper for first name and last name search with the Like operator
 *
 * Return value can be used as follow :
 *     \Illuminate\Database\Query\Builder::where(firstNameLastNameLike(...))
 *     \Illuminate\Database\Eloquent\Model::with(['relationName' => firstNameLastNameLike(...)])
 *
 * @param string $term
 *
 * @return \Closure
 */
function firstNameLastNameLike($term)
{
    return function ($query) use ($term) {
        $query->whereRaw("CONCAT(last_name, ' ', first_name) LIKE '%$term%'")
              ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE '%$term%'");
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


/**
 * @param float $latitudeFrom
 * @param float $longitudeFrom
 * @param float $latitudeTo
 * @param float $longitudeTo
 *
 * @return int in meters
 */
function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo) {
    if (($latitudeFrom == $latitudeTo) && ($longitudeFrom == $longitudeTo)) {
        return 0;
    }

    $theta     = $longitudeFrom - $longitudeTo;
    $distance  = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo));
    $distance += cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));

    $distance = acos($distance);
    $distance = rad2deg($distance);

    $milesToKilometersMultiplier = 1.609344;
    $distanceInKilometers = $distance * 60 * 1.1515 * $milesToKilometersMultiplier;

    return (int) ($distanceInKilometers * 1000);
}

/**
 * @param array $startPoint [ lat, lng ]
 * @param array $destinationsInput [ [ lat, lng ], ... ]
 *
 * @return array [ [ lat, lng ], ... ] $destinationsInput ordered to form the best route
 */
function bestRoute($startPoint, $destinationsInput)
{
    $route        = [];
    $origin       = $startPoint;
    $totalCost    = 0;
    $destinations = array_values($destinationsInput);

    while (count($destinations) > 0) {
        [ $origin, $index, $cost ] = closestDestination($origin, $destinations);

        unset($destinations[$index]);
        $route[]    = $origin;
        $totalCost += $cost;
    }

    return $route;
}

/**
 * @param array $origin [ lat, lng ]
 * @param array $destinations [ [ lat, lng ], ... ]
 *
 * @return array [ $closestDestination, $closestDestinationIndex, $closestDistance ]
 */
function closestDestination($origin, $destinations)
{
    $closestDistance         = 1000000000;
    $closestDestination      = [];
    $closestDestinationIndex = -1;

    foreach ($destinations as $index => $destination) {
        $distance = distance($origin[0], $origin[1], $destination[0], $destination[1]);

        if ($closestDistance > $distance) {
            $closestDistance         = $distance;
            $closestDestination      = $destination;
            $closestDestinationIndex = $index;
        }
    }

    return [ $closestDestination, $closestDestinationIndex, $closestDistance ];
}
