<?php

namespace App\Services\DelayReport\Strategies;

use App\Contracts\Interfaces\LatenessStrategyInterface;
use App\Models\DelayReport;
use App\Services\Queue\QueueService;

class QueueStrategy implements LatenessStrategyInterface
{

    public function report(int $orderId): DelayReport
    {
        $delay = DelayReport::query();
        /** @var DelayReport $history */
        $history = $delay->where('order_id', $orderId)
            ->where('status', DelayReport::QUEUE_STATUS)->first();

        if ($history !== null) {
            return $history;
        }

        /** @var QueueService $queue */
        $queue = resolve(QueueService::class);

        $queue->push($orderId);

        return DelayReport::create(
            [
                'order_id' => $orderId,
                'status' => DelayReport::QUEUE_STATUS,
                'eta' => null
            ]
        );
    }
}
