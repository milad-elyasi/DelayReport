<?php

namespace App\Dto\Assignee;

class CreateAssigneeDto
{
    private function __construct(
        private int $agentId
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['agentId']
        );
    }

    /**
     * @return int
     */
    public function getAgentId(): int
    {
        return $this->agentId;
    }


}
