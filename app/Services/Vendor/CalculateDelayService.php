<?php

namespace App\Services\Vendor;

use App\Models\Vendor;
use Illuminate\Pagination\LengthAwarePaginator;


class CalculateDelayService
{
    public function handle(): LengthAwarePaginator
    {
        return Vendor::query()->withSum('delays', 'eta')->paginate(15);
    }

}
