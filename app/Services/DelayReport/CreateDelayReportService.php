<?php

namespace App\Services\DelayReport;

use App\Contracts\Interfaces\LatenessStrategyInterface;
use App\Dto\DelayReport\CreateDelayReportDto;
use App\Models\Order;
use App\Models\Trip;
use App\Services\DelayReport\Strategies\EtaStrategy;
use App\Services\DelayReport\Strategies\QueueStrategy;
use App\Services\Queue\QueueService;

class CreateDelayReportService
{

    public function handle(CreateDelayReportDto $dto)
    {
        $order = Order::where('id', $dto->getOrderId())->whereHas('trip', function ($query) {
            return $query->whereIn('status', Trip::ETA_STATUSES);
        })->first();

        return $this->decide($order->id ?? null)->report($dto->getOrderId());

    }

    private function decide(?int $orderId): LatenessStrategyInterface
    {
        return match ($orderId) {
            null => new QueueStrategy(),
            default => new EtaStrategy(),
        };

    }
}
