<?php

namespace App\Rules;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\InvokableRule;

class ValidDelay implements InvokableRule
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
        $order = Order::select(['created_at', 'delivery_time'])->find($value);
        $created_at = Carbon::parse($order->created_at);
        if (now() <= $created_at->addMinutes($order->delivery_time)) {
            $fail('Delivery time is not passed yet!');
        }
    }
}
