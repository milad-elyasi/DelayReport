<?php

namespace App\Http\Requests\Order;

use App\Dto\Order\CreateTripDto;
use App\Dto\Order\UpdateOrderDto;
use App\Http\Requests\BaseFormRequest;
use OpenApi\Annotations as OA;

class UpdateOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'min:32', 'max:36'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('id')]);
    }

    public function getDto(): UpdateOrderDto
    {
        return UpdateOrderDto::fromArray($this->validated());
    }
}
