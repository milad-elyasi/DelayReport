<?php

namespace Tests;

use App\Resources\Order\OrdersCollection;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected function getResourceArray(JsonResource $resource): array
    {
        return $resource->response()->getData(true);
    }

    protected function getOrderCollectionArray(OrdersCollection $resource): array
    {
        return $resource->response()->getData(true);
    }

    protected function extractResponseBody(TestResponse $response): array
    {
        return json_decode($response->content(), true);
    }
}
