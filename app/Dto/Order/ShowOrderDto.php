<?php

namespace App\Dto\Order;


class ShowOrderDto
{
    private function __construct(
        private int $id,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
        );
    }

    /**
     * @return int
     */
    public function getKey(): int
    {
        return $this->id;
    }

}
