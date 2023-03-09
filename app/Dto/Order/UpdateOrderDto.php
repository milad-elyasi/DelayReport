<?php

namespace App\Dto\Order;


class UpdateOrderDto
{
    private function __construct(
        private int    $id,
        private string $name,
        private int    $deliveryTime,
        private int    $vendorId
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['delivery_time'],
            $data['vendor_id'],
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
