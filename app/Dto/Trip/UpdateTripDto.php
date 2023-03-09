<?php

namespace App\Dto\Trip;


class UpdateTripDto
{
    private function __construct(
        private int    $id,
        private string $status,
        private int    $orderId,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['status'],
            $data['orderId'],
        );
    }


    /**
     * @return int
     */
    public function getKey(): int
    {
        return $this->id;
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
