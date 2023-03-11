<?php

namespace Tests\Unit\Services;

use App\Dto\DelayReport\CreateDelayReportDto;
use App\Models\Order;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vendor;
use App\Services\DelayReport\CreateDelayReportService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DelayStrategyTest extends TestCase
{
    use DatabaseTransactions;

    public function testReturnNewEtaShouldWork(): void
    {
        // arrange
        $vendor = Vendor::factory()->create();
        $user = User::factory()->create();
        $sut = new CreateDelayReportService();
        $order = Order::factory()->create(['user_id' => $user->getKey(), 'vendor_id' => $vendor->getKey()]);
        $trip = Trip::factory()->create(['order_id' => $order->getKey()]);
        $dto = CreateDelayReportDto::fromArray(['orderId' => $order->getKey()]);
        $sut->handle($dto);

        $this->assertDatabaseHas('delay_reports', [
            'order_id' => $order->id,
            'status' => 'ETA'
        ]);
    }

    public function testAddToQueueShouldWork(): void
    {
        // arrange
        $vendor = Vendor::factory()->create();
        $user = User::factory()->create();
        $sut = new CreateDelayReportService();
        $order = Order::factory()->create(['user_id' => $user->getKey(), 'vendor_id' => $vendor->getKey()]);
        $dto = CreateDelayReportDto::fromArray(['orderId' => $order->getKey()]);
        $sut->handle($dto);

        $this->assertDatabaseHas('delay_reports', [
            'order_id' => $order->id,
            'status' => 'QUEUE'
        ]);
    }

}
