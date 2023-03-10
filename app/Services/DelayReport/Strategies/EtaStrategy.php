<?php

namespace App\Services\DelayReport\Strategies;

use App\Contracts\Interfaces\LatenessStrategyInterface;
use App\Models\DelayReport;
use App\Services\Integrations\GetNewEtaIntegrationService;

class EtaStrategy implements LatenessStrategyInterface
{

    public function report(int $orderId): DelayReport
    {
        $etaService = resolve(GetNewEtaIntegrationService::class);
        return DelayReport::create(
            [
                'order_id' => $orderId,
                'status' => DelayReport::ETA_STATUS,
                'eta' => $etaService->eta()
            ]
        );
    }
}
