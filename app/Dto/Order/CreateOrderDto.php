<?php

namespace App\Dto\Order;

class CreateOrderDto
{
    private function __construct(
        private string $name,
        private int    $deliveryTime,
        private int    $vendorId
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['delivery_time'],
            $data['vendor_id'],
        );
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return int
     */
    public function getDeliveryTime(): int
    {
        return $this->deliveryTime;
    }

    /**
     * @return int
     */
    public function getVendorId(): int
    {
        return $this->vendorId;
    }

}
