<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Order create($attributes = [], ?Model $parent = null)
 * @method Order make($attributes = [], ?Model $parent = null)
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'vendor_id' => Vendor::factory(),
            'delivery_time' => $this->faker->numberBetween(10, 90)
        ];
    }
}
