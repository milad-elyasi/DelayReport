<?php

namespace App\Dto\DelayReport;

class CreateDelayReportDto
{
    private function __construct(
        private string $status,
        private int    $orderId,
        private ?int   $eta
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['status'],
            $data['orderId'],
            $data['eta'] ?? null,
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

    /**
     * @return int|null
     */
    public function getEta(): ?int
    {
        return $this->eta;
    }


}
