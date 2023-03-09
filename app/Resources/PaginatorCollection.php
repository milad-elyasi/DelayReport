<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class PaginatorCollection extends ResourceCollection
{
    protected array $meta;

    public function __construct(LengthAwarePaginator $resource)
    {
        $this->meta = [
            'currentPage' => $resource->currentPage(),
            'from' => $resource->firstItem(),
            'to' => $resource->lastItem(),
            'total' => $resource->total()
        ];
        $resource = $resource->getCollection();
        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        return [
            'data' => $this->getData(),
            'meta' => $this->getMeta()
        ];
    }

    abstract protected function getData(): ResourceCollection;

    public function getMeta(): array
    {
        return $this->meta;
    }
}
