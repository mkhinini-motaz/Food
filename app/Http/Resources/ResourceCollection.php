<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection as BaseResourceCollection;
use Illuminate\Support\Collection;

class ResourceCollection extends BaseResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'        => $this->collection,
            'total'       => $this->resource->total(),
            'lastPage'    => $this->resource->lastPage(),
            'currentPage' => $this->resource->currentPage(),
        ];
    }

    /**
     * Get the resource that this resource collects.
     *
     * @return string|null
     */
    protected function collects()
    {
        return 'App\Http\Resources\\' . class_basename($this->resource->first()) . 'Resource';
    }

    /**
     * @param LengthAwarePaginator $data
     *
     * @return JsonResponse
     */
    public static function jsonResponse(LengthAwarePaginator $data)
    {
        return (new self($data))->response();
    }
}
