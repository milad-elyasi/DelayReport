<?php

namespace App\Resources\Order;

use App\Resources\PaginatorCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;


class OrdersCollection extends PaginatorCollection
{
    protected function getData(): ResourceCollection
    {
        return OrderResource::collection($this->collection);
    }
}
