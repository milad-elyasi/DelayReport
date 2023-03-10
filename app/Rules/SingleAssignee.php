<?php

namespace App\Rules;

use App\Models\Agent;
use App\Models\DelayReport;
use App\Models\Trip;
use Illuminate\Contracts\Validation\InvokableRule;

class SingleAssignee implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $agent = Agent::query()->where('id', $value)
            ->whereHas('assignees.order.delayReport', function ($query) {
                $query->whereNot('status', DelayReport::SOLVED_STATUS);
            })->first();

        if ($agent !== null) {
            $fail('you have one order to resolve!');
        }

    }
}
