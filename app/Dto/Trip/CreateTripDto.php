<?php

namespace App\Dto\Trip;


class CreateTripDto
{
    private function __construct(
        private string $status,
        private int    $orderId,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['status'],
            $data['orderId'],
        );
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }


    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

}
