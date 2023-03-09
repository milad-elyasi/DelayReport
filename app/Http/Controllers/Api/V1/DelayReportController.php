<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DelayReport\CreateDelayReportRequest;
use App\Services\DelayReport\CreateDelayReportService;


class DelayReportController extends Controller
{
    public function create(CreateDelayReportRequest $request, CreateDelayReportService $service)
    {
        return $service->handle($request->getDto());
    }
}
