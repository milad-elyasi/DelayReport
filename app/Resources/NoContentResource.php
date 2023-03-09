<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class NoContentResource extends JsonResource
{
    public function withResponse($request, $response): void
    {
        $response->setStatusCode(Response::HTTP_NO_CONTENT);
    }

    public static function make(...$parameters): NoContentResource
    {
        return parent::make(null);
    }
}
