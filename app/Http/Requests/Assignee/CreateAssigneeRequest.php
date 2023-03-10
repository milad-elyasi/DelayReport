<?php

namespace App\Http\Requests\Assignee;

use App\Dto\Assignee\CreateAssigneeDto;
use App\Http\Requests\BaseFormRequest;
use App\Rules\SingleAssignee;

class CreateAssigneeRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'agentId' => ['required', 'int', new SingleAssignee()],
        ];
    }

    public function getDto(): CreateAssigneeDto
    {
        return CreateAssigneeDto::fromArray($this->validated());
    }
}
