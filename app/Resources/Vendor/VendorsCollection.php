<?php

namespace App\Resources\Vendor;

use App\Resources\PaginatorCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;


class VendorsCollection extends PaginatorCollection
{
    protected function getData(): ResourceCollection
    {
        return VendorResource::collection($this->collection);
    }
}
