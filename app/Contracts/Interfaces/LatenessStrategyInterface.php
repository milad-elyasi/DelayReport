<?php

namespace App\Contracts\Interfaces;

use App\Models\DelayReport;
use App\Models\Order;

interface LatenessStrategyInterface
{
    public function report(int $orderId): DelayReport;
}
