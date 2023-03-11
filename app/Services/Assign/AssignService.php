<?php

namespace App\Services\Assign;

use App\Dto\Assignee\CreateAssigneeDto;
use App\Models\Assignee;
use App\Services\Queue\QueueService;

class AssignService
{
    public function __construct(private QueueService $queueService)
    {
    }

    public function handle(CreateAssigneeDto $dto)
    {
        /** @var Assignee $assign */
        $assign = Assignee::query();
        $orderId = $this->queueService->pop() ?? null;

        if ($orderId === null) {
            return null;
        }

        $history = $assign->where('order_id', $orderId)
            ->where('agent_id', $dto->getAgentId())->first();

        if ($history !== null) {
            return $history;
        }

        return $assign->create(
            [
                'order_id' => $orderId,
                'agent_id' => $dto->getAgentId(),
            ]
        );
    }
}
