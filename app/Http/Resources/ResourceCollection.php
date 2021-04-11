<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection as BaseResourceCollection;

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
     * @param array $data
     *
     * @return JsonResponse
     */
    public static function jsonResponse($data)
    {
        return (new self($data))->response();
    }
}
