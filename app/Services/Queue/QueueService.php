<?php

namespace App\Services\Queue;

use Illuminate\Support\Facades\Redis;

class QueueService
{
    public function addToQueue($item): void
    {
        $currentQueuePayload = Redis::get('order_queue') ?? [];
        $data = json_decode($currentQueuePayload);
        $data[] = $item;
        Redis::set('order_queue', json_encode($data));

    }

    public function getFirst()
    {
        return json_decode(Redis::get('order_queue'))[0] ?? null;
    }

    public function pop()
    {
        $currentQueuePayload = Redis::get('order_queue');
        $data = json_decode($currentQueuePayload);

        if (count($data) > 0) {
            $element = $data[0];
            unset($data[0]);
            Redis::set('order_queue', json_encode($data));
        }
        return $element ?? null;
    }

}
