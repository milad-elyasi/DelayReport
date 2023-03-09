<?php

namespace App\Http\Requests\DelayReport;

use App\Dto\DelayReport\CreateDelayReportDto;
use App\Http\Requests\BaseFormRequest;

class CreateDelayReportRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'orderId' => ['int', 'unique:delay_reports,order_id'],
        ];
    }

    public function getDto(): CreateDelayReportDto
    {
        return CreateDelayReportDto::fromArray($this->validated());
    }
}
