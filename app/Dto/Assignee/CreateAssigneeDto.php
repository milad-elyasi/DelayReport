<?php

namespace App\Dto\Assignee;

class CreateAssigneeDto
{
    private function __construct(
        private int $userId,
        private int $agentId
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['agentId'],
            $data['orderId'],
        );
    }

    /**
     * @return int
     */
    public function getAgentId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->agentId;
    }


}
