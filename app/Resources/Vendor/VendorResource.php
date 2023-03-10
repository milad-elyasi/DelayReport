<?php

namespace App\Resources\Vendor;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class VendorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'totalDelay' => intval($this->delays_sum_eta) ?? 0
        ];
    }
}
