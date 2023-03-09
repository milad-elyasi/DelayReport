<?php

namespace App\Dto\Order;

use Illuminate\Http\UploadedFile;

class UpdateOrderDto
{
    private function __construct(
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
        );
    }

    public function getKey(): string
    {
        return $this->id;
    }

}
