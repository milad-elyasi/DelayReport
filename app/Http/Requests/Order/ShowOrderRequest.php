<?php

namespace App\Http\Requests\Order;

use App\Dto\Order\ShowOrderDto;
use App\Http\Requests\BaseFormRequest;

class ShowOrderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'int', 'min:1'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['id' => $this->route('id')]);
    }

    public function getDto(): ShowOrderDto
    {
        return ShowOrderDto::fromArray($this->validated());
    }
}
