<?php

namespace App\Services\DelayReport;

use App\Dto\DelayReport\CreateDelayReportDto;

class CreateDelayReportService
{
    public function handle(CreateDelayReportDto $dto)
    {
        return true;
    }
}
