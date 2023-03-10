<?php

namespace App\Http\Controllers\Api\V1;

use App\Dto\Assignee\CreateAssigneeDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Assignee\CreateAssigneeRequest;
use App\Services\Assign\AssignService;
use Illuminate\Http\Request;

class AssigneeController extends Controller
{
    public function assign(CreateAssigneeRequest $request, AssignService $service)
    {
        return $service->handle($request->getDto());
    }
}
