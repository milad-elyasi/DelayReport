<?php

namespace App\Resources\Order;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
        ];
    }
}
