<?php

namespace App\Services\Queue;

use Illuminate\Support\Facades\Redis;

class QueueService
{
    public function push($item): void
    {
        Redis::lpush('queue', $item);
    }

    public function pop()
    {
        return Redis::rpop('queue');
    }

}
