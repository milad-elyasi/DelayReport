<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Resources\Vendor\VendorsCollection;
use App\Services\Vendor\CalculateDelayService;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function calculateDelay(CalculateDelayService $service)
    {
        return VendorsCollection::make($service->handle());
    }
}
