<?php

namespace App\Http\Requests\DelayReport;

use App\Dto\DelayReport\CreateDelayReportDto;
use App\Http\Requests\BaseFormRequest;
use App\Rules\ValidDelay;

class CreateDelayReportRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'orderId' => ['required', 'int', new ValidDelay()],
        ];
    }

    public function getDto(): CreateDelayReportDto
    {
        return CreateDelayReportDto::fromArray($this->validated());
    }
}
