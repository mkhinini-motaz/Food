<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    /**
     * Get the resource that this resource collects.
     *
     * @return string|null
     */
    protected function collects()
    {
        return 'App\Http\Resources\\' . class_basename($this->resource) . 'Resource';
    }

    /**
     * @param object $data
     *
     * @return JsonResponse
     */
    public static function jsonResponse($data)
    {
        return (new self($data))->response();
    }
}
