<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\BaseFormRequest;

class ShowOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'vendorId' => ['nullable', 'int', 'min:1'],
        ];
    }

    public function getVendorId(): ?int
    {
        return $this->get('vendorId');
    }
}
