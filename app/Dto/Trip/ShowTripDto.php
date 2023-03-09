<?php

namespace App\Dto\Trip;


class ShowTripDto
{
    private function __construct(
        private int $orderId,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['orderId'],
        );
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

}
